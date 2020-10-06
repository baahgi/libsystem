<div class="w-40 h-screen overflow-auto bg-gray-600">
    <div class="py-10">
        <div class="flex px-4">
            <div>
                <svg class="w-10 h-10 mr-4 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-white">Admin</p>
                <p class="mt-2 text-sm text-right text-white">
                    <span class="inline-block w-3 h-3 p-1 mr-2 bg-green-500 rounded-full"></span>
                    online
                </p>
            </div>

        </div>
        <div class="py-1 pl-2 mt-4 text-gray-500 bg-gray-400">
            REPORTS
        </div>
        <div class="px-4 mt-4 font-semibold text-white">
           <a href="{{ url('admin') }}"> Dashboard</a>
        </div>
        <div class="py-1 pl-2 mt-4 text-gray-500 bg-gray-400">
            MANAGE
        </div>

        <div class="px-4">
            <div class="mt-4 text-sm font-semibold text-gray-300 hover:text-white">
                Transaction
                <div class="p-1 mt-1 ml-1 bg-gray-500 rounded">
                    <p><a href="{{ route('borrow.index') }}"> Borrow</a></p>
                    <p class="mt-2"><a href="{{ route('return.index') }}"> Return</a></p>
                </div>
            </div>
            <div class="mt-4 text-sm font-semibold text-gray-300 hover:text-white">
                Books
                <div class="p-1 mt-1 bg-gray-500 rounded ml-">
                    <p><a href="{{ route('books.index') }}"> Book List</a></p>
                    <p class="mt-2"><a href="{{ route('categories.index') }}"> Categories</a></p>
                </div>
            </div>
            <div class="mt-4 text-sm font-semibold text-gray-300 hover:text-white">
                Students
                <div class="p-1 mt-1 ml-1 bg-gray-500 rounded">
                    <p><a href="{{ route('students.index') }}"> Student List</a></p>
                    <p class="mt-2"><a href="{{ route('courses.index') }}"> Courses</a></p>
                </div>
            </div>
            <div class="mt-4 text-sm font-semibold text-gray-300 hover:text-white">
                Print
                <div class="p-1 mt-1 ml-1 bg-gray-500 rounded">
                    <p><a href="{{ route('print.stats') }}">Statistics</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
