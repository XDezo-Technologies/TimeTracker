    @extends('layouts.main')

    @section('content')
   
    <div class="right-section">
        <div class="top">

            <span>Time Sheet</span>
            <div class="top-right">
                <a href="http://">

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

        <div class="weeks">

            <div class="arrows">
                <div class="ico">
                    <div class="sides ">
                        <ion-icon name="chevron-back-sharp"></ion-icon>
                        <div class="tooltiptext"> Pous</div>
                    </div>
                    <div class="middle">
                        <ion-icon name="share-social-outline">

                        </ion-icon><ion-icon name="share-social-outline"></ion-icon>
                    </div>
                    <div class="sides ">
                        <ion-icon name="chevron-forward-sharp"></ion-icon>
                        <div class="tooltiptext"> Previous</div>
                    </div>
                </div>

                <span>Today,20 june</span>
            </div>




        </div>


        <!-- .third section' -->
        <div class="work">

            <div class="working">

                <form action="" class="form">
                    <input type="text" class="work-" placeholder="What are you working on?">
                </form>


                <button class="start-button">
                    <span> Start Timer</span><ion-icon name="share-social-outline"></ion-icon>

                </button>



            </div>



            <!-- .third section' -->

        </div>

    </div>

    </div>
    </section>

@endsection