<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Program</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white">

<!-- 🔙 BACK (OUTSIDE CARD) -->
<div class="max-w-2xl mx-auto px-6 pt-10">
    <a href="{{ route('dashboard') }}"
       class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 19l-7-7 7-7" />
        </svg>

        Dashboard
    </a>
</div>

<!-- PAGE CENTER -->
<div class="min-h-screen flex items-center justify-center px-6 pb-12">

    <div class="w-full max-w-2xl bg-gray-900 border border-gray-800 rounded-2xl shadow-xl p-8">

        <!-- HEADER -->
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold">➕ Create New Program</h2>
            <p class="text-gray-400 text-sm mt-2">Fill in the details below</p>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-5 bg-green-600/20 border border-green-500 text-green-300
                        px-4 py-3 rounded-xl text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="{{ route('programs.store') }}" class="space-y-4">
            @csrf

            <input type="text" name="title" placeholder="Program Title" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none">

            <input type="text" name="category" placeholder="Category" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none">

            <textarea name="description" rows="4" placeholder="Description" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>

            <input type="text" name="duration" placeholder="Duration (e.g. 3 months)" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none">

            <!-- 💰 PRICE EN DOLLAR -->
            <input type="number" name="price" placeholder="Price ($)" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none">

            <input type="text" name="instructor" placeholder="Instructor" required
                class="w-full p-3 rounded-xl bg-gray-800 border border-gray-700
                       focus:ring-2 focus:ring-indigo-500 outline-none">

            <!-- BUTTON -->
            <button type="submit"
                class="w-full py-3 rounded-xl font-semibold
                       bg-gradient-to-r from-indigo-600 to-purple-600
                       hover:from-indigo-700 hover:to-purple-700 transition">

                Create Program
            </button>
        </form>

    </div>

</div>

</body>
</html>