<div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">UPC</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->upc }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a target="_blank" href="{{ url('storage/images/' . $product->image_url) }}">View Image</a>
                        </td>
                        <td>
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    height="24" data-bs-toggle="modal" data-bs-target="#updateProduct"
                                    stroke-width="1.5" wire:click="edit({{ $product->id }})" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" onclick="confirm('Are you sure you want to remove the product?') || event.stopImmediatePropagation()" wire:click='delete({{ $product->id }}) '
                                    height="24" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProductLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateProductLabel">Update Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product title</label>
                            <input type="text" name="title" wire:model="title" class="form-control" id="title"
                                placeholder="Title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Product Price</label>
                            <input type="text" name="title" wire:model="price" class="form-control" id="price"
                                placeholder="Price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="upc" class="form-label">Product UPC</label>
                            <input type="text" name="upc" wire:model="upc" class="form-control" id="upc"
                                placeholder="UPC">
                            @error('upc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Product Status</label>
                            <select class="custom-select form-control" name="status" wire:model="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" wire:model="image" name="image"
                                aria-label="Upload">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mt-3">
                                @if ($image_url)
                                    <img src="{{ url('storage/images/' . $image_url) }}" height="100"
                                        alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#updateProduct').modal('hide');
        });
    </script>
@endpush
