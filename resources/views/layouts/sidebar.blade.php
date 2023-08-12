<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<section>
    <!-- whole -->

    <div class="lists">
        <ul>

            <li>
                <a href="{{route('tasks.index')}}">
                    <ion-icon name="chevron-back-sharp"></ion-icon>
                    Tasks
                </a>
            </li>
            <li>
                <a href="{{route('dashboard')}}">
                    <ion-icon name="chevron-back-sharp"></ion-icon>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('projects')}}">
                    <ion-icon name="chevron-back-sharp"></ion-icon>
                    Projects
                </a>
            </li>
            <li>
                <a href="">
                    <ion-icon name="chevron-back-sharp"></ion-icon>
                    Profile
                </a>
            </li>
            <li>

            @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn btn-primary py-2 mr-1" href="#" data-toggle="modal"
                                data-target="#exampleModal">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end bg-white" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{'/dashboard'}}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                   
                @endguest
            </li>


        </ul>
    </div>

    <div class="whole">

        <!-- left -->
        <div class="left-section">

            <div class="logo pt-3 pb-3 d-flex gap-2 wrap border-bottom">
                <img src="{{asset('css/timer.png')}}" class=" height"> <span class="none">Time Tracker</span>

                <div class="toggle" onclick="toggle()"> <ion-icon name="chevron-back-sharp" id="iconElement"></ion-icon>
                </div>
            </div>

            <div class="menu" onclick="toggleMenu()">
                <ion-icon id="menu-icon" name="chevron-back-sharp"></ion-icon>
            </div>


            <div class="tools-c">
            
                <div class="analyze pt-4  pb-3  gap-2 border-bottom">

                    <span class="light-text"> Analyze</span>
                    <div class="tools d-flex gap-1">
                    <a href="{{ route('dashboard') }}" class="d-flex gap-1">
                        <ion-icon name="pie-chart-outline"></ion-icon>
                        <span class="none">Dashboard</span>
                        </a>
                    </div>
                    <div class="tools  ">
                        <a href="{{ route('tasks.index') }}" class="d-flex gap-1">
                            <ion-icon name="speedometer-outline"></ion-icon>
                            <span class="none">Tasks</span>
                        </a>
                    </div>
                  

                </div>
                <div class="analyze pt-4 pb-3 border-bottom">
                    <span class="light-text"> Analyze</span>

                  
                    <div class="tools">
                        <a href="{{ route('profile') }}" class="d-flex gap-1">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <span class="none">Profile</span>
                        </a>
                    </div>
                    <div class="tools">
                        <a href="{{ route('projects') }}" class="d-flex gap-1">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <span class="none">Project</span>
                        </a>
                    </div>
                    <div class="tools ">
                        <a id="openModalBtn" class="d-flex gap-1">
                            <ion-icon name="log-out-outline"></ion-icon>
                            <span class="none">Logout</span>
                        </a>

                        <div id="modal" class="modal ">
                            <div class="modal-content2">

                                <h2>Realy Want to Logout??</h2>
                                <span>

                                    <form action="{{ route('logout') }}" method="POST" class="logout">
                                        @csrf
                                        <button type="submit" name="lg_btn">Logout</button>
                                    </form>

                                    <button id="closeModalBtn">Cancel</button>
                                </span>
                            </div>
                        </div>




                    </div>
                </div>


            </div>


        </div>

        <script>
            const openModalBtn = document.getElementById("openModalBtn");
            const closeModalBtn = document.getElementById("closeModalBtn");
            const modal = document.getElementById("modal");

            openModalBtn.addEventListener("click", () => {
                modal.style.display = "block";
            });

            closeModalBtn.addEventListener("click", () => {
                modal.style.display = "none";
            });

            window.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        </script>
        <!-- whole -->
