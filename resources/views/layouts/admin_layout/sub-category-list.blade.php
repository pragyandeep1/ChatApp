<?php $dash.='-- '; ?>
@foreach($subcategories as $subcategory)
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr>
        <td>{{$_SESSION['i']}}</td>
        <td>{{$dash}}{{$subcategory->name}}</td>
        <td>{{$subcategory->type}}</td>
        <td>{{$subcategory->parent->name}}</td>
        <td>
            <div class="d-flex gap-3">
            <a href="{{Route('editCategory', $subcategory->id)}}">
                <button class="btn  btn-info">Edit</button>
            </a>
                <form action="{{ url('category-delete/'.$subcategory->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                </form>
            </div>
        </td>
    </tr>
    @if(count($subcategory->subcategory))
        @include('layouts.admin_layout.sub-category-list',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach