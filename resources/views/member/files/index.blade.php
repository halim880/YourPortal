@extends('layouts.backend._member')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <button class="btn btn-success" id="folder_create_btn" onclick="CreateBtnClicked()">Create folder</button>
                        <div class="from-group d-flex">
                            <label for="Name" class="ms-3">Folder Name</label>
                            <input type="text" name="folder" id="folder_name" class="form-control mx-1">
                            <button onclick="folderSaveBtnClicked(event)" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex flex-wrap">
                        @foreach ($folders as $folder)
                        <div class="folder-image">
                            <a href="" class="btn btn-sm" onclick="trashButtonClicked({{$folder->id}})"><i class=" dripicons-trash trash-icon"></i></a>
                            <img class="img-responsive" ondblclick="goInside({{$folder->id}})" src="{{asset("assets/folder.jpg")}}" alt="">
                            <p style="text-align: center">{{$folder->name}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<style scoped>

    .folder-image{
        position: relative;
        margin: 10px;
        height: 150px;
        width: 150px;
        border: 1px dotted grey !important;
        border-radius: 20px;
        overflow: hidden;
    }
    .folder-image img{
        width: 100%;
        height: 70%;
        border-radius: 10px;
    }

    .folder-image .img-responsive{
        cursor: pointer;
    }

    .trash-icon{
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .hide {
        display: none;
    }
</style>





<script>
    

async function folderSaveBtnClicked(event) {
    event.preventDefault();

    await Post('/member/folder/store', {
        name: document.getElementById('folder_name').value, 
        parent_id: 1
    });        

    location.reload();
}

async function trashButtonClicked(id) {

    await Delete('/member/folder/delete/'+ id);        

    console.log('Hello');
}

function goInside(id) {
    console.log(id);
}


function CreateBtnClicked(e) {
    console.log('hello');
    const btn = document.getElementById('folder_create_btn');
    btn.style.visibility = 'hidden';
}

 async function Post(_endPoint, _data) {
        
    var baseUrl = "http://127.0.0.1:8000/api";
    const options = {
        method: 'POST',
        body: JSON.stringify(_data),
        headers: {
            'Accept' : 'application/json',
            'Content-Type': 'application/json'
        }
    }

    var url = baseUrl + _endPoint;

    var res = await fetch(url, options);

    console.log(res.json());
}

async function Delete(_endPoint) {
        
        var baseUrl = "http://127.0.0.1:8000/api";
        const options = {
            method: 'DELETE',
            headers: {
                'Accept' : 'application/json',
                'Content-Type': 'application/json'
            }
        }
    
        var url = baseUrl + _endPoint;
    
        var res = await fetch(url, options);
    
        console.log(res.json());
    }
</script>
