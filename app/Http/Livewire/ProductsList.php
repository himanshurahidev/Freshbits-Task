<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Termwind\Components\Dd;

class ProductsList extends Component
{
    use WithFileUploads;

    public $title, $price, $upc, $image, $image_url, $status, $product_id;
    public function render()
    {
        return view('livewire.products-list', [
            'products' => Product::all(),
        ]);
    }

    public function delete(Product $product)
    {
        Storage::disk('public')->delete('images/' . $product->image_url);
        $product->delete();
    }

    public function edit(Product $product)
    {
        $this->product_id = $product->id;
        $this->title = $product->title;
        $this->price = $product->price;
        $this->upc = $product->upc;
        $this->image_url = $product->image_url;
        $this->status = $product->status;
    }
    public function update()
    {
        $this->validate([
            'title' => 'required|min:3',
            'price' => 'required|numeric',
            'upc' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        if ($this->image) {
            $this->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            Storage::disk('public')->delete('images/' . $this->image_url);
            $image = $this->image;
            $imageName = time() . '.' . $image->extension();
            Storage::disk('public')->putFileAs('images', $image, $imageName);
            $this->image_url = $imageName;
        }

        Product::find($this->product_id)->update([
            'title' => $this->title,
            'price' => $this->price,
            'upc' => $this->upc,
            'image_url' => $this->image_url,
            'status' => $this->status,
        ]);
        session()->flash('success', 'Product Updated Successfully.');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('closeModal'); 
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->price = '';
        $this->upc = '';
        $this->image = '';
        $this->image_url = '';
        $this->status = '';
    }
}
