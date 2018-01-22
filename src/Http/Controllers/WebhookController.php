<?php

namespace Laravel\Aws\Http\Controllers;

use Aws\Sns\MessageValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Event;
use Laravel\Aws\Events\ConfirmationReceived;
use Laravel\Aws\Events\NotificationReceived;
use Laravel\Aws\Events\SubscriptionConfirmationReceived;
use Laravel\Aws\Events\UnsubscribeConfirmationReceived;
use Laravel\Aws\Listeners\ConfirmationHandler;
use Laravel\Aws\Sns\Message;

class WebhookController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        Event::listen(ConfirmationReceived::class, ConfirmationHandler::class);
    }

    /**
     * Action
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            // Get message
            $message = Message::fromSymfonyRequest($request);

            // Validate message
            (new MessageValidator())->validate($message);

            switch ($message['Type']) {
                case Message::TYPE_SUBSCRIPTION_CONFIRMATION:
                    Event::dispatch(new SubscriptionConfirmationReceived(), [], true);
                    break;

                case Message::TYPE_UNSUBSCRIBE_CONFIRMATION:
                    Event::dispatch(new UnsubscribeConfirmationReceived(), [], true);
                    break;

                case Message::TYPE_NOTIFICATION:
                    Event::dispatch(new NotificationReceived(), [], true);
                    break;

                default:
                    return $this->responseCode(Response::HTTP_BAD_REQUEST);
            }

            return $this->responseCode(Response::HTTP_OK);

        } catch (\RuntimeException $exception) {
            Log::debug($exception->getMessage() . PHP_EOL . $exception->getTraceAsString());
        } catch (\InvalidArgumentException $exception) {
            Log::debug($exception->getMessage() . PHP_EOL . $exception->getTraceAsString());
        }

        return $this->responseCode(Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param int $statusCode
     * @return \Illuminate\Http\Response
     */
    protected function responseCode(int $statusCode)
    {
        if (!isset(Response::$statusTexts[$statusCode])) {
            $statusCode = Response::HTTP_BAD_REQUEST;
        }

        return response(Response::$statusTexts[$statusCode], $statusCode);
    }
}
