    @extends('layouts.main')


    @section('content')
        <div class="right-section">

            <div class="top">

                <span>Projects / View</span>
                <div class="top-right">
                    <a href="{{ route('profile') }}">

                        <ion-icon name="share-social-outline"></ion-icon>
                    </a>
                    <a href="http://">

                        <ion-icon name="person-circle"></ion-icon>
                    </a>
                    <a href="http://">

                        <ion-icon name="help-circle-outline"></ion-icon>
                    </a>
                    <a href="http://">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </a>

                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="tasks">


                <div class="projects">
                    <div class="card">

                        <div class="card_left card-section">

                            <p class="info"> <span>Project :</span>{{ $projects->projectName }}</p>
                            <p class="info"> <span>Description :</span>{{ $projects->descriptions }}</p>
                            <p class="info"> <span>Status :</span> {{ $projects->status }}</p>


                        </div>
                        <div class="card_right card-section">


                            <p class="info"> <span>Started At :</span>{{ $projects->created_at->format('Y-m-d') }}
                            </p>
                            <p class="info">
                                <span>Due Date :</span> {{ \Carbon\Carbon::parse($projects->dueDate)->toDateString() }}
                            </p>
                            <p class='info'>
                                <span>Time Remaining :</span><span id="countdown" class="info"></span>
                            </p>
                        </div>

                        <div class="card-section">



                            @php
                                $totalTasks = App\Models\tasks::where('project_id', $projects->id)->count();
                            @endphp
                            <p class="info"> <span>Total Task :</span>{{ $totalTasks }}</p>


                            <a href="{{route('tasks.index')}} " class="btn btn-secondary">Create new Task</a>

                        </div>
                    </div>

                </div>




            </div>
        </div>

   



        </section>
        <script>
            function openModal() {
                var modal = document.getElementById('projectModal');
                modal.style.display = 'block';
            }

            function closeModal() {
                var modal = document.getElementById('projectModal');
                modal.style.display = 'none';
            }


            function updateCountdown(targetDate) {
                var now = new Date().getTime();
                var target = new Date(targetDate).getTime();
                var timeRemaining = target - now;

                var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = days + " days, " + hours + " hours, " + minutes +
                    " minutes, " + seconds + " seconds";

                if (timeRemaining <= 0) {
                    document.getElementById("countdown").innerHTML = "Expired";
                }
            }

            function startCountdown() {
                // Replace 'YYYY-MM-DD HH:mm:ss' with your actual target date and time
                // For example: updateCountdown('2023-08-31 23:59:59');
                var targetDate = '{{ $projects->dueDate }}';

                // Update the countdown immediately
                updateCountdown(targetDate);

                // Update the countdown every second
                setInterval(function() {
                    updateCountdown(targetDate);
                }, 1000);
            }

            // Start the countdown when the page loads
            startCountdown();
        </script>
    @endsection
