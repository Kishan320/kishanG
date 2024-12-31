<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productcontroller extends Controller
{
    //
    public function addproduct(Request $request)
    {
        $data = new product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data->image = $filename;
        }
        $ch1 = $request->checkbox ? implode(',', $request->checkbox) : null;
        $data->checkbox = $ch1;
        $data->radio = $request->radio;
        $data->combobox = $request->combobox;
        $data->save();

        return redirect('/display');
    }
    public function display()
    {
        $data2 = product::get();
        return view('list-product', ['data2' => $data2]);
    }
    public function edit($id)
    {
        $data3 = product::find($id);
        return view('edit-product', ['data3' => $data3]);
    }
    public function update(Request $request, $id)
    {
        $data4 = product::find($id);
        $data4->name = $request->name;
        $data4->price = $request->price;
        $data4->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data4->image = $filename;
        }
        $ch2 = is_array($request->checkbox) ? implode(',', $request->checkbox) : '';
        $data4->checkbox = $ch2;
        $data4->radio = $request->radio;
        $data4->combobox = $request->combobox;
        $data4->save();
        return redirect('/display');
    }
    public function delete($id)
    {
        $data6 = product::find($id);
        $data6->delete();
        return redirect('/display');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search the products table for matches
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->orWhere('checkbox', 'LIKE', "%{$query}%")
            ->get();

        // Generate the rows for the table dynamically
        $output = '';
        foreach ($products as $product) {
            $output .= '
            <tr>
                <td>' . $product->name . '</td>
                <td>' . $product->price . '</td>
                <td>' . $product->description . '</td>
                <td>
                    <img src="' . asset('uploads/' . $product->image) . '" class="img-thumbnail" style="width: 100px; height: 100px;" />
                </td>
                <td>' . $product->checkbox . '</td>
                <td>' . $product->radio . '</td>
                <td>' . $product->combobox . '</td>
                <td>
                    <a href="edit/' . $product->id . '" class="btn btn-dark btn-sm">Edit</a>
                    <a href="delete/' . $product->id . '" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>';
        }

        // Return the generated HTML to the AJAX request
        return response()->json($output);
    }
}
