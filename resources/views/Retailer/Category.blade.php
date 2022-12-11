@extends('Retailer.layout')

@section('Retail-title')
    Category-Retail
@endsection

@section('Retail-content')

<div style="padding:30px"></div>
<div class="container">
    <h2 style="color:red">ajax</h2>
    <div class="row">
        <div class="col-sm-8">
        <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="catTable">
      <!-- <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr> -->
      
    </tbody>
  </table>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <span id="addT">Add Category</span>
                    <span id="updateT">Update Category</span>
                </div>
            </div>
        

    <div class="form-group">
      <label class="control-label col-sm-2" for="categoryName">Name:</label>
      <div class="col-sm-10">
     
      <input type="hidden" class="form-control" id="userId" value="{{Auth::user()->id}}" >
      <input type="text" class="form-control" id="categoryName" placeholder="Category Name" >
       
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="CategoryDescription">Description:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="CategoryDescription" placeholder="Enter Description" >
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <!-- <button type="submit" id="addButton" onclick="addData()" class="btn btn-warning">Submit</button> -->
        <input type="submit" id="addCatButton" onclick="addData()" class="btn btn-warning" value="submit">
        <button type="submit" id="updateCatButton" class="btn btn-warning">update</button>
      </div>
    </div>
  
        </div>
    </div>
</div>

@endsection