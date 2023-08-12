@extends('layouts.main')


@section('content')

    <div class="right-section">

        <div class="top">

            <span>Projects / Tasks</span>
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
            <div id="flash-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="notification-container" class="alert alert-success" style="display: none;"></div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- modal and forms --}}
        <style>
            .container {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
            }

            .form-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                row-gap: 1rem;
                width: 100%;
                padding: 1rem;
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



            .input-container input:hover {
                box-shadow: 1px 1px 3px rgba(147, 143, 143, 0.365) inset;
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

            .submit:hover {
                box-shadow: 1px 2px 4px rgba(86, 83, 83, 0.687)
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
                border: none;
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

            /* Styling for the modal container */
            .modal-container {
                display: none;
                position: fixed;
                z-index: 999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
            }

            /* Styling for the modal content */
            .modal-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                /* background-color: transparent; */
                padding: 20px;
                display: flex;
                justify-content: center;
                border-radius: 5px;

            }

            .close:hover {
                box-shadow: 1px 2px 4px rgba(86, 83, 83, 0.687)
            }

            .close {
                display: block;
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
                padding-left: 1.25rem;
                padding-right: 1.25rem;
                background-color: #e54646;
                color: #ffffff;
                font-size: 0.875rem;
                line-height: 1.25rem;
                font-weight: 500;
                width: 20%;
                border: none;
                border-radius: 0.5rem;
                text-transform: uppercase;

            }


            /* form */
        </style>


        {{-- layouts --}}

        <style>
            .create {
                width: 30%;
            }

            .open:hover {
                box-shadow: 2px 2px 6px rgba(70, 69, 69, 0.774);
            }

            .open {

                display: block;
                padding-top: 0.75rem;
                transition: 0.3s cubic-bezier(0.23, 1, 0.320, 1);
                padding-bottom: 0.75rem;
                padding-left: 1.25rem;
                padding-right: 1.25rem;
                /* background-color: #46e561; */
                background-color: #3C3D42;
                color: #F6F8E2;
                font-size: 0.875rem;
                line-height: 1.25rem;
                font-weight: 500;
                box-shadow: 1px 1px 4px rgba(70, 69, 69, 0.548);
                border: none;
                border-radius: 0.5rem;
                text-transform: uppercase;
            }

            .search-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                padding-left: 5rem;

            }

            .search-container form {
                width: 70%;
                display: flex;
                padding-bottom: 1rem;
            }

            .search-container form button:hover {
                background-color: #b2bdd4;
            }

            .search-container form input {
                width: 80%;
                padding: 0.5rem 1rem;
                border: none;
                outline: none;
                box-shadow: 1px 1px 4px rgba(91, 89, 89, 0.872);
                border: none;
            }

            .search-container form button {
                width: 7%;
                border: none;
                padding: 4.6px 10px;
                color: #F6F8E2;
                font-size: 1.28rem;
                background-color: #3C3D42;
                box-shadow: 1px 1px 4px rgb(91, 89, 89);


            }


            .search-container form input:hover {
                box-shadow: 1px 1px 4px rgba(36, 37, 36, 0.422);

            }


            .table {
                padding: 0rem 3rem;
            }
     
                    a {
                        color: black;
                        text-decoration: none;
                    }



                    td .tableLinks {

                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;

                        justify-content: space-between;
                    }

                    .tableLinks a:hover {
                        color: #9CCD62;
                    }

                    .tableLinks a {
                        background-color: #3C3D42;
                        padding: 0.1rem 0.8rem;
                        color: #F6F8E2;



                    }

                    .tableLinks button:hover {
                        color: #F6F8E2;
                    }

                    .tableLinks button {
                        padding: 0.1rem 0.3rem;
                        border: none;
                        background-color: #3C3D42;
                        color: #ed7575;
                    }
           
        </style>
        <div id="taskModal" class="modal-container">
                <!-- Modal content -->
                <div class="modal-content1">
                    <div class="form-container">

                    <form method="post" action="{{ route('tasks.store') }}">
                             @csrf
                            <p class="form-title">Add a new Project</p>
                            <div class="input-container">
                                <label for="duaDate">Descriptions</label>
                                <br><hr>
                                <textarea name="description" id="" placeholder="Enter Details" cols="70" rows="4"></textarea>

                            </div>
                            <div class="input-container">
                            <label for="duaDate">Select a Project</label><hr>
                            <div class="d-flex gap-5">
                            <div><a href="{{route('projects')}}" class="btn btn-primary">Create a new project</a></div>
    <select name="project_id"  id="project_id" class="form-control" placeholder="Enter Details">
        <!-- Populate the options dynamically from the properties table -->
        @foreach ($projects as $project)
            <option value="{{ $project->id }}"  data-name="{{ $project->projectName }}" >
                {{ $project->projectName }}
            </option>
        
        @endforeach
    </select>


    </div>
                                                
                                            </div>
                                            <hr>
                                            <input type="hidden" class="form-control" id="projectName" name="title" readonly>
                            <button type="submit" class="submit">
                                Create
                            </button>
                        </form>
                        <button onclick="closeModal()" class="close">Cancel</button>
                    </div>
                </div>

            </div>
        <div class="search-container">


            <form action="" method="GET">
                <input type="text" name="search" value="" placeholder="Search task">
                <button type="submit"><ion-icon name="search-outline"></ion-icon></button>
            </form>
            <div class="create">
                <button onclick="openModal()" class="open">Create New Task</button>
            </div> 

        </div>

        <hr>
        <div class="table">



            @if ($tasks->isEmpty())
                <p>No Task found. Please Create a Task.</p>
            @elseif ($tasks->isEmpty())
                <p>No tasks found for ""</p>
            @elseif ($tasks->isNotEmpty())
                <table>
                    <style>
                        table {
                            color: #3C3D42;
                            width: 100%;
                            background: transparent;
                        }

                        th,
                        td {
                            padding: 5px;
                        }


                        th {
                            background-color: #3C3D42;
                            color: #F6F8E2;
                        }

                        tr:hover {
                            background-color: #9CCD62;
                        }

                        td {
                            font-size: 1rem;
                            
                        }
                    </style>
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Task Name</th>
                            <th>Project Name</th>
                            <th>Started At</th>
                            <th>Completed At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($tasks->isEmpty())
            <tr>
                <td colspan="4">No tasks found.</td>
            </tr>
        @else
            @foreach ($tasks as $task)
                <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->description}}</td>
                    <td>{{ $task->title}}</td>
                    <td>{{ $task->started_at ?? 'Not started' }}</td>
                    <td>{{ $task->completed_at ?? 'Not completed' }}</td>
                    <td>
                      
                        <div class="tableLinks">
                       @if (!$task->is_completed)
                            @if ($task->started_at)
                                <form method="post" action="{{ route('tasks.stop', $task) }}">
                                    @csrf
                                    <button type="submit">Stop Timer</button>
                                </form>
                            @else
                                <form method="post" action="{{ route('tasks.start', $task) }}">
                                    @csrf
                                    <button type="submit">Start Timer</button>
                                </form>
                            @endif
                        @endif
                    
                                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                                        data-bs-target="#modalId{{ $task->id }}">
                                                        Delete
                                                    </button>

                                                    <!-- Modal Body -->
                                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                    <div class="modal fade" id="modalId{{ $task->id }}" tabindex="-1"
                                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalTitleId">Delete Form
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete?
                                                                    {{ $task->title }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success"
                                                                        data-bs-dismiss="modal">Cancel</button>

                                                                    <form
                                                                        action="{{ route('tasks.destroy', $task->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Optional: Place to the bottom of scripts -->
                                                    <script>
                                                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                                    </script>
                                            </form>
                                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
                    </tbody>
                </table>
            @else
                <p>No projects found. Please create a project.</p>
            @endif


            <script>
                // JavaScript functions to handle the modal
                function openModal() {
                    var modal = document.getElementById('taskModal');
                    modal.style.display = 'block';
                }

                function closeModal() {
                    var modal = document.getElementById('taskModal');
                    modal.style.display = 'none';
                }


                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 3000); // 5000 milliseconds = 5 seconds
                //

                document.addEventListener('DOMContentLoaded', function() {
                    var startButton = document.getElementById('startButton');
                    var stopButton = document.getElementById('stopButton');

                    // Retrieve the task started state from localStorage
                    var isTaskStarted = localStorage.getItem('taskStarted');

                    // Update button visibility based on the retrieved state
                    if (isTaskStarted === 'true') {
                        startButton.style.display = 'none';
                        stopButton.style.display = 'block';
                    } else {
                        startButton.style.display = 'block';
                        stopButton.style.display = 'none';
                    }

                    startButton.addEventListener('click', function() {
                        // Update localStorage to indicate task is started
                        localStorage.setItem('taskStarted', 'true');

                        // Update button visibility
                        startButton.style.display = 'none';
                        stopButton.style.display = 'block';
                    });

                    stopButton.addEventListener('click', function() {
                        // Update localStorage to indicate task is stopped
                        localStorage.setItem('taskStarted', 'false');

                        // Update button visibility
                        stopButton.style.display = 'none';
                        startButton.style.display = 'block';
                    });
                });

                document.getElementById('project_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var vehicleAfterPrice = selectedOption.getAttribute('data-name');

        document.getElementById('projectName').value = vehicleAfterPrice;
      });
      
    

                //
                $(document).ready(function() {
                    $(".start-time-form").submit(function(event) {
                        event.preventDefault();

                        var form = $(this);

                        $.ajax({
                            url: form.attr("action"),
                            type: "POST",
                            data: form.serialize(),
                            dataType: "json", // Ensure this is set to JSON
                            success: function(response) {
                                console.log(response.message);

                                var notificationContainer = $('#notification-container');
                                notificationContainer.html(response.message).slideDown();

                                // Hide the notification after a delay (e.g., 5 seconds)
                                setTimeout(function() {
                                    notificationContainer.slideUp();
                                }, 3000);
                            },
                            error: function(xhr) {
                                console.error("Error: " + xhr.responseText);
                            }
                        });
                    });
                });
            </script>

        </div>


    </div>
    </section>
@endsection
