@extends('manage.layout')
@section('title', __('Edit') . ' - ' . $data->name)

@section('content')

<link href="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.js"></script>

<h1>{{__('Edit')}} - {{ $data->name }}</h1>
    <div class="row">
        <div class="col-12 col-xl-4">
            <form action="{{route($_routeBase . 'update', [$data])}}" method="POST">
                @method('patch')
                @csrf

                <div class="form-group mb-2">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $data->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="SKU">{{ __('SKU') }}</label>
                    <input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" value="{{ old('sku', $data->sku) }}">
                    @error('sku')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="price">{{ __('Price') }}</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price', $data->price) }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description', $data->description) }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="category_id">{{ __('Category') }}</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">{{ __('Top Level') }}</option>
                        @foreach ($topList as $object)
                            <option value="{{ $object->id }}" @if ($object->id === $data->category_id) selected @endif>{{ $object->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="tags">{{ __('Tags') }}</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" list="tagSearchList" autocomplete="off" placeholder="{{__('Search')}}" id="tagSearchInput" aria-label="{{__('Search')}}" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" onclick="addTag('tagSearchInput','tags')" id="button-addon2">{{__('Add')}}</button>
                        <datalist id="tagSearchList">
                        </datalist>
                    </div>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" value="{{ old('tags', implode(',', $tags)) }}">
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <script>
                    $("#tagSearchInput").keypress(function(event) {
                        if (event.which == 13) {
                            addTag('tagSearchInput','tags');
                            event.preventDefault();
                        }
                    });
                    const tagInput=UseBootstrapTag(document.getElementById('tags'));
                    var tagSearchInputTimer;
                      function addTag(searchInputId,tagInputId){
                          let searchInput = document.getElementById(searchInputId);
                          tagInput.addValue(searchInput.value);
                          $.ajax({
                            url:"{{route('manage.tag.store')}}",
                            type:"POST",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                name:searchInput.value
                            },
                            success:function(data){
                                //tagInput.addValue(data.name);
                            }
                          });
                          searchInput.value="";
                      }

                      $("#tagSearchInput").on("keyup", function(e) {
                          if(e.keyCode == 13) {
                              addTag('tagSearchInput','tags');
                          }
                          clearTimeout(tagSearchInputTimer);
                          tagSearchInputTimer = setTimeout(function() {
                              var tagSearchList = document.getElementById("tagSearchList");
                              tagSearchList.innerHTML = "";
                              $.ajax({
                                  url: "{{route('manage.tag.search')}}",
                                  type: "GET",
                                  data: {
                                      q: tagSearchInput.value
                                  },
                                  success: function(data) {
                                      for (var i = 0; i < data.length; i++) {
                                          var option = document.createElement("option");
                                          option.value = data[i].name;
                                          option.text = data[i].name;
                                          tagSearchList.appendChild(option);
                                      }
                                  }
                              });
                          }, 300);
                      });
                </script>


                <div class="form-group mb-2">
                    <label for="images">{{ __('Images') }}</label>
                    {{for($i=0;$i<count($data->images);$i++)}}
                    <img src="{{$data->images[$i]->path}}" class="img-thumbnail" style="max-width: 100px;max-height: 100px;">
                    {{endfor}}
                    <input class="form-control" type="file" id="images" name="images[]" accept=".jpg,.jpeg,.png"  multiple>
                    @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">{{ __('Update') }}</button>

            </form>
        </div>
    </div>
@endsection
