  @if (count($books) > 0)
      <div class="d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center gap-3 mb-3 p-2">
          @foreach ($books as $book)
              <div class="text-center rounded shadow border-0 p-3 mt-5 d-flex flex-wrap book-info bg-light text-dark">
                  <div class="book" style="flex-basis:53%">
                      @if ($book->photo == null)
                          <img src="{{ asset('storage/default.jpg') }}" class="rounded w-100" alt="default">
                      @else
                          <img src="{{ asset('storage/cover/' . $book->photo) }}" class=" rounded w-100" alt="book cover">
                      @endif
                  </div>
                  <div class="detail" style="flex-basis: 46%">
                      <p class="m-0 p-0 text-dark">{{ $book->title }}</p>
                      <p class="m-0 p-0 text-muted">{{ $book->author->name }}</p>
                      {{-- <p class="mt-2" style="margin-left: 1px">{{ Str::words($book->summary, 6, '...') }}</p> --}}
                      <p class="mt-2 p-0 text-success">{{ $book->price }} kyats</p>
                      <p class="mt-2 p-0 text-dark"> <i class="fas fa-eye"></i> 0</p>
                      <div class="ratign mt-2 text-warning">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                      </div>
                  </div>
                  <div class="book-btn mt-3">
                      <div class="d-flex justify-content-between">
                          <a href="{{ route('book#detail', $book->id) }}" class=" py-1 btn btn-outline-secondary">
                              <span class="m-0 p-0">{{ count($book->comments) }} Comments</span> &nbsp;<i
                                  class="fas fa-comment-alt"></i>
                          </a>
                          <a href="{{ route('book#detail', $book->id) }}"
                              class=" py-1 text-decoration-none text-primary">See More
                              &nbsp;<i class=" fs-5 fas fa-angle-double-right"></i> </a>
                      </div>
                      <div class="mt-2 d-flex justify-content-between cart-Buttons">
                          @if (Auth::user() != null)
                              <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                          @endif
                          <input type="hidden" id="bookId" value="{{ $book->id }}">
                          <a href="{{ route('download#book', $book->id) }}" class=" py-1 btn btn-primary ">
                              Download &nbsp;<i class="fas fa-file-download"></i>
                          </a>
                          <span class="py-1 btn btn-success d-block ms-4 add-cart" style="cursor: pointer">
                              Add To Cart &nbsp;<i class="fas fa-shopping-cart"></i>
                          </span>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
      <div class="mt-1 px-3">{{ $books->links() }}</div>
  @else
      <div class="text-center mt-5">
          <p class="fs-4 text-muted">No Book Found...😞</p>
      </div>
  @endif
