<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome </title>
</head>
<body>
    <h1>Hello, {{ $name }}!</h1>
    <p>Thank you for registering. We are glad to have you on board!</p>
    <h2>How to implement event-listener?</h2>
    <ul>
        <li><strong>Create the Event:</strong><br>
            <code>php artisan make:event UserRegistered</code>
        </li>

        <li><strong>Create the Listener:</strong><br>
            <code>php artisan make:listener SendWelcomeEmail --event=UserRegistered</code>
        </li>

        <li><strong>Register Event & Listener:</strong><br>
            Open <code>App\Providers\EventServiceProvider.php</code> and add:
            <pre><code>
        protected $listen = [
            \App\Events\UserRegistered::class => [
                \App\Listeners\SendWelcomeEmail::class,
            ],
        ];
            </code></pre>
        </li>

        <li><strong>Dispatch Event when User Registers:</strong><br>
            In your controller (e.g., RegisterController):
            <pre><code>
        use App\Events\UserRegistered;

        // After creating user
        event(new UserRegistered($user));
            </code></pre>
        </li>

        <li><strong>Create a Mailable:</strong><br>
            <code>php artisan make:mail WelcomeEmail</code>
        </li>

        <li><strong>Send Email in Listener:</strong><br>
            In <code>SendWelcomeEmail</code> listener:
            <pre><code>
        use App\Mail\WelcomeEmail;
        use Illuminate\Support\Facades\Mail;

        public function handle(UserRegistered $event)
        {
            Mail::to($event->user->email)->send(new WelcomeEmail($event->user->name));
        }
            </code></pre>
        </li>

        <li><strong>Make Listener Queued (Optional but Recommended):</strong><br>
            Implement <code>ShouldQueue</code>:
            <pre><code>
        use Illuminate\Contracts\Queue\ShouldQueue;

        class SendWelcomeEmail implements ShouldQueue
        {
            // ...
        }
            </code></pre>
        </li>

        <li><strong>Run Queue Worker:</strong><br>
            <code>php artisan queue:work</code>
        </li>
    </ul>

</body>
</html>