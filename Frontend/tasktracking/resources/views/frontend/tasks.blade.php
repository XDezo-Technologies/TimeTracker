@extends('layouts.main')

@section('content')
    <div class="right-section">




        <h4 class="profile_heading"> <span>Home/</span> Tasks</h4>


        <style>
            .profile_heading {
                position: relative;
                padding: 2rem 0 1rem 4rem;
                font-weight: 600;
                text-decoration: underline;
            }

            .profile_heading span {
                text-decoration: none;
            }

            .profile {
                display: flex;
                justify-content: center;

            }

            .card {
                --main-color: #000;
                --submain-color: #78858F;
                --bg-color: #fff;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                position: relative;
                width: 90%;
                height: 90%;
                display: flex;
                flex-direction: column;
                align-items: center;
                border-radius: 20px;
                background: var(--bg-color);
                padding-bottom: 30px;
            }

            .card__img {
                height: 192px;
                width: 100%;
            }

            .card__img svg {
                height: 100%;
                border-radius: 20px 20px 0 0;
            }

            .card__avatar {
                position: absolute;
                width: 114px;
                height: 114px;
                background: var(--bg-color);
                border-radius: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                top: calc(50% - 57px);
            }

            .card__avatar svg {
                width: 100px;
                height: 100px;
            }

            .card__title {
                margin-top: 60px;
                font-weight: 500;
                font-size: 18px;
                color: var(--main-color);
            }

            .card__subtitle {
                margin-top: 10px;
                font-weight: 400;
                font-size: 15px;
                color: var(--submain-color);
            }

            .card__btn {
                margin-top: 15px;
                width: 76px;
                height: 31px;
                border: 2px solid var(--main-color);
                border-radius: 4px;
                font-weight: 700;
                font-size: 11px;
                color: var(--main-color);
                background: var(--bg-color);
                text-transform: uppercase;
                transition: all 0.3s;
            }

            .card__btn-solid {
                background: var(--main-color);
                color: var(--bg-color);
            }

            .card__btn:hover {
                background: var(--main-color);
                color: var(--bg-color);
            }

            .card__btn-solid:hover {
                background: var(--bg-color);
                color: var(--main-color);
            }
        </style>

    </div>
    </section>
@endsection