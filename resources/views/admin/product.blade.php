@extends('admin.main')

@section('title', 'Products')

@section('content')
    <h1>Product Page</h1>

    <div class="row">
        <div class="col-12">

            <button type="button" class="btn btn-primary" style="width: 100px; font-size:19px;" data-toggle="modal"
                data-target="#exampleModal">
                Create
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div>
                                    <label for="name" class="form-label">Product Name:</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="price" class="form-label">Product Price:</label>
                                    <input type="number" id="price" class="form-control" name="price"
                                        value="{{ old('price') }}" required>
                                    @error('price')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="product_id" class="form-label">Parent Product (optional):</label>
                                    <select id="product_id" class="form-control" name="agent_id"
                                        onchange="updateProductLink()">
                                        <option value="">No Parent</option>
                                        @foreach ($models as $model)
                                            <option value="{{ $model->id }}"
                                                {{ old('agent_id') == $model->id ? 'selected' : '' }}>
                                                {{ $model->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('agent_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <a href="#" id="productChildrenLink" class="btn btn-warning mt-2">
                                    Selected Product's children
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

            <table class="table table-bordered table-hover mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Agent Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agentProducts as $index => $agentProduct)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $agentProduct->agent->name }}</td>
                            <td>{{ $agentProduct->product->name }}</td>
                            <td>{{ $agentProduct->price }} $</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection
