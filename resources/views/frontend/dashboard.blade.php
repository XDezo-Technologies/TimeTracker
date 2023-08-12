@extends('layouts.main')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .work {
            display: flex;
            justify-content: space-between;
        }

        .working {
            width: 50%;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .working h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .working form div {
            margin-bottom: 15px;
        }

        .working label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .working input[type="text"],
        .working textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .working button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .working button:hover {
            background-color: #0056b3;
        }
        
        /* Style for the task list display */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin: auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

    </style>
</head>
<div class="right-section">
    <div class="top">
        <span>Time Sheet</span>
        <div class="top-right">
            <a href="http://"><ion-icon name="share-social-outline"></ion-icon></a>
            <a href="http://"><ion-icon name="person-circle"></ion-icon></a>
            <a href="http://"><ion-icon name="help-circle-outline"></ion-icon></a>
            <a href="http://"><ion-icon name="person-add-outline"></ion-icon></a>
        </div>
    </div>
    
    @if (session('success'))
        <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="weeks">
        <div class="arrows">
            <div class="ico">
                <div class="sides">
                    <ion-icon name="chevron-back-sharp"></ion-icon>
                    <div class="tooltiptext">Pous</div>
                </div>
                <div class="middle">
                    <ion-icon name="share-social-outline"></ion-icon>
                    <ion-icon name="share-social-outline"></ion-icon>
                </div>
                <div class="sides">
                    <ion-icon name="chevron-forward-sharp"></ion-icon>
                    <div class="tooltiptext">Previous</div>
                </div>
            </div>
           <span>{{ date('Y-m-d') }}</span>
        </div>
    </div>


   
   
    <div class="table p-4">


    <h2>Project Detail</h2>
@if ($projects->isEmpty())
    <p>No projects found. Please Create a Project.</p>
@elseif ($projects->isEmpty())
    <p>No projects found for "</p>
@elseif ($projects->isNotEmpty())
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
                text-align: start;
            }

            th:nth-child(5) {
                text-align: center
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
                <th>Project Name</th>
                <!-- Add other table headers as needed -->
                <th>Created At</th>
                <th>Due Date</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->projectName }}</td>

                    <td>{{ $project->created_at->format('Y-m-d') }}</td>

                    <td>{{ $project->dueDate }}</td>

                    <td>
                        <div class="tableLinks">
                            <a href="{{ route('vprojects', ['project_id' => $project->id]) }}">View</a>
                           
                        </div>
                    </td>

                    <!-- Add other table cells for project data -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No projects found.<a href="{{route('projects')}}"> Please create a project.</a></p>
@endif
<style>
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

<div class="table p-1 pt-4">

<h2>Task Detail</h2>

@if ($projects->isEmpty())
    <p>No projects found. Please Create a Project.</p>
@elseif ($projects->isEmpty() )
    <p>No projects found for </p>
@elseif ($projects->isNotEmpty())
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
                text-align: start;
            }

            th:nth-child(5) {
                text-align: center
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
                <th>Task</th>
                <th>Project</th>
                <th>Start Time</th>

                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->description}}</td>
                    <td>{{ $task->title}}</td>
                    <td>{{ $task->started_at ?? 'Not started' }}</td>
                    <td>{{ $task->completed_at ?? 'Not completed' }}</td>

                   

                    <!-- Add other table cells for project data -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No tasks found. </p> <a href="{{route('tasks.index')}}" class="btn"> Please create a task.</a>
@endif
<style>
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

<script>
    // Automatically hide the flash message after 3 seconds (adjust as needed)
    setTimeout(function() {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
@endsection
