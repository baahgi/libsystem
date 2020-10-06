
<div class="flex flex-col">



    <div class="flex">

        <h3 class="text-lg underline">STATISTICS OF THE LIBRARY</h3>
        <div class="flex-1 mt-4 ml-6 mr-2">

                <div class="flex flex-col mt-10 space-y-6">
                      <div class="flex">
                            <span class="w-1/4">Students:</span>
                            <span  class="w-3/4 ml-8">{{ $students }}</span>
                      </div>
                      <div class="flex mt-4">
                            <span  class="w-1/4">Books:</span>
                            <span  class="w-3/4 ml-8 capitalize">{{ $books }}</span>
                      </div>
                      <div class="flex mt-4">
                            <span  class="w-1/4">Books Borrowed:</span>
                            <span  class="w-3/4 ml-8">{{ $booksBorrowed }}</span>
                      </div>
                      <div class="flex mt-4">
                            <span  class="w-1/4">Books returned:</span>
                            <span  class="w-3/4 ml-8">{{ $booksReturned }}</span>
                      </div>


                </div>

        </div>
  </div>
</div>

