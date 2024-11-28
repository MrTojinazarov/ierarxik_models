@extends('admin.main')

@section('title', 'Create Agent')

@section('content')
    <h1>Create Agent</h1>

    <button type="button" class="btn btn-primary" style="width: 100px; font-size:19px;" data-toggle="modal"
        data-target="#exampleModal">
        Create
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('agent.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf

                        <div>
                            <label for="name" class="form-label">Agent Name:</label>
                            <input type="text" id="name" class="form-control" name="name" required>
                        </div>

                        <div>
                            <label for="phone" class="form-label">Agent Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div>
                            <label for="parent_id" class="form-label">Parent Agent (optional):</label>
                            <select id="parent_id" class="form-control" name="parent_id" onchange="updateLink()">
                                <option value="">No Parent</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}">
                                        {{ $model->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="#" id="childrenLink" class="btn btn-warning mt-2">
                            Selected's children
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            @php
                function renderChild($data)
                {
                    if ($data->children->count() > 0) {
                        echo '<ul class="list-group list-group-flush ms-3">';
                        foreach ($data->children as $child) {
                            echo "<li class='list-group-item'>{$child->id}, {$child->name}</li>";
                            renderChild($child);
                        }
                        echo '</ul>';
                    }
                }
            @endphp

            @foreach ($models as $model)
                <ul class="list-group">
                    <li class="list-group-item">
                         {{ $model->id }}, {{ $model->name }} <hr style="border: 0; height: 1px; background-color: black;">

                        @php
                            renderChild($model);
                        @endphp
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
@endsection
