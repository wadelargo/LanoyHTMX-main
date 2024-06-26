@extends('templates.base')

@section('content')

<div class="container mx-auto p-6">

    <div class="flex items-center">
        <h1 class="text-4xl pr-60">Products</h1>
        <form hx-get="/api/products"
              hx-target="#products-list"
              hx-trigger="submit">
            <input type="text"
                   name="filter"
                   class="p-2 border border-gray-300 ml-5 mr-2 rounded"
                   placeholder="Filter products">
        </form>
        <button id="openModalBtn" class="btn bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-blue-700 shadow-lg transition duration-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H5a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Product
        </button>
    </div>
    <hr class="my-4">
    <div id="products-list" class="flex flex-wrap gap-3" hx-get="/api/products" hx-trigger="load" hx-swap="innerHTML"></div>

    <div id="myModal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-full max-w-md" hx-get="/open" hx-trigger="load" hx-swap="innerHTML">

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

    document.getElementById("openModalBtn").addEventListener('click', function() {

    var modal = document.getElementById("myModal");

    modal.classList.remove("hidden");

    });

});

function closeModal() {

    var modal = document.querySelector('.modal');

    if (modal) {
        modal.classList.add('hidden');
    }

    var inputs = document.querySelectorAll('#modalForm input');
    inputs.forEach(function(input) {
        input.value = '';
    });

    var message = document.getElementById('success');
    if (message) {
        message.style.display = 'none';
    }

}
</script>

@endsection
