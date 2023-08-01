<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<section>
    <!-- whole -->
    <div class="whole">

        <!-- left -->
        <div class="left-section">

            <div class="logo pt-3 pb-3 d-flex gap-2 wrap border-bottom">
                <img src="logo.png" class=" height"> <span class="none">Time Teracker</span>

                <div class="toggle" onclick="toggle()"> <ion-icon name="chevron-back-sharp" id="iconElement"></ion-icon>
                </div>
            </div>

            <div class="menu" onclick="toggleMenu()">
                <ion-icon id="menu-icon" name="chevron-back-sharp"></ion-icon>
            </div>

            <div class="lists">
                <ul>
                    <li>
                        <a href="">
                            <ion-icon name="chevron-back-sharp"></ion-icon>
                            <div class="tooltiptext"> Pous</div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <ion-icon name="chevron-back-sharp"></ion-icon>
                            <div class="tooltiptext"> Pous</div>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="tools-c">
                <div class="analyze pt-4    pb-3 gap-2 border-bottom">
                    <span class="light-text"> Track</span>
                    <div class="tools d-flex gap-1 ">
                        <ion-icon name="timer-outline"></ion-icon>
                        <span class="none">TimeSheet</span>
                    </div>

                </div>
                <div class="analyze pt-4  pb-3  gap-2 border-bottom">
                    <span class="light-text"> Analyze</span>
                    <div class="tools  ">
                        <a href="{{ route('dashboard') }}" class="d-flex gap-1">
                            <ion-icon name="speedometer-outline"></ion-icon>
                            <span class="none">Dashboard</span>
                        </a>
                    </div>
                    <div class="tools d-flex gap-1">
                        <ion-icon name="pie-chart-outline"></ion-icon>
                        <span class="none">Dashboard</span>
                    </div>
                </div>
                <div class="analyze pt-4 pb-3 border-bottom">
                    <span class="light-text"> Analyze</span>
                    <div class="tools d-flex gap-1">
                        <ion-icon name="folder-outline"></ion-icon>
                        <span class="none">Projects</span>
                    </div>
                    <div class="tools">
                        <a href="{{ route('profile') }}" class="d-flex gap-1">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <span class="none">Profile</span>
                        </a>
                    </div>
                    <div class="tools ">
                        <a id="openModalBtn" class="d-flex gap-1">
                            <ion-icon name="log-out-outline"></ion-icon>
                            <span class="none">Logout</span>
                        </a>

                        <div id="modal" class="modal">
                            <div class="modal-content">

                                <h2>Realy Want to Logout??</h2>
                                <span>
                                    <button><a href="{{ route('logout') }}">Logout</a></button>
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