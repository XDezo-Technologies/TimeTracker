<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <style>
        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .form {
            background-color: #fff;
            display: block;
            padding: 1rem;
            max-width: 350px;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .form-title {
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 600;
            text-align: center;
            color: #000;
        }

        .input-container {
            position: relative;
        }

        .input-container input,
        .form button {
            outline: none;
            border: 1px solid #e5e7eb;
            margin: 8px 0;
        }

        .input-container input {
            background-color: #fff;
            padding: 1rem;

            font-size: 0.875rem;
            line-height: 1.25rem;
            width: 300px;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .submit {
            display: block;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            background-color: #46e561;
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            width: 100%;
            border-radius: 0.5rem;
            text-transform: uppercase;
        }

        .signup-link {
            color: #6B7280;
            font-size: 0.875rem;
            line-height: 1.25rem;
            text-align: center;
        }

        .signup-link a {
            text-decoration: underline;
        }
    </style>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf
            <p class="form-title">Sign in to your account</p>
            <div class="input-container">
                <input type="text" name="name" placeholder="Enter your name">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="email" name="email" placeholder="Enter email">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="tel" name="phone" placeholder="Enter Phone Number">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="password" name='password' placeholder="Enter password">
            </div>
            <div class="input-container">
                <input type="password" placeholder="Confinrm password" name='password'>
            </div>
            <button type="submit" class="submit">
                Sign in
            </button>

            <p class="signup-link">
                Already Have an account ?
                <a href="{{ route('login') }}">Login</a>
            </p>
        </form>


    </div>

</body>



</html>
