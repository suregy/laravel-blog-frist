        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

                <!-- Categories Widget -->
               
    <div class="card my-4">
          <h5 class="card-header">Total {{ $kategori->total() }} Kategori</h5>
          <div class="card-body">
            
              @foreach($kategori as $kat)
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#"> {{ $kat->nama }} <span class="float-right badge badge-dark text-wrap">{{$kat->get_blog()->count()}} posts </span></a>
                  </li>
                </ul>
                @endforeach
             
          </div>
        </div>


        <div class="card my-4">
          <h5 class="card-header">Total {{ $tags->count() }} Tags </h5>
          <div class="card-body">
          @foreach($tags as $tag)
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#"> {{ $tag->tag }} <span class="float-right badge badge-dark text-wrap">{{$tag->get_blog()->count()}} posts </span> </a>
                  </li>
                </ul>
              @endforeach
          </div>
        </div>