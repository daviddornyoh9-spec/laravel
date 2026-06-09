<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-white">

<!-- NAVBAR -->
<header class="bg-gray-900 border-b border-gray-800">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold tracking-wide">
            Praktix
        </h1>

        <nav class="flex items-center gap-6 text-sm text-gray-300">

            <a href="{{ route('programs.index') }}" class="hover:text-white">
                Programs
            </a>

            <a href="{{ route('profile.edit') }}" class="hover:text-white">
                Profile
            </a>

            <!-- LOGOUT BUTTON -->
            <button onclick="openModal()"
                class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm">
                Logout
            </button>

        </nav>
    </div>
</header>

<!-- CONTENT -->
<main class="max-w-6xl mx-auto px-6 py-10">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold">Welcome {{ auth()->user()->name }}</h2>
        <p class="text-gray-400 mt-1">Browse programs and track your applications</p>
    </div>

    <!-- QUICK ACTIONS -->
    <section class="mb-10">

        <h3 class="text-xl font-semibold mb-4 border-l-4 border-indigo-500 pl-3">
            Quick Actions
        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            <a href="{{ route('programs.index') }}"
               class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-indigo-500 transition">

                <h4 class="text-lg font-semibold mb-2">View Programs</h4>
                <p class="text-gray-400 text-sm">
                    Explore available training programs and apply easily.
                </p>

            </a>

            <a href="#applications"
               class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-indigo-500 transition">

                <h4 class="text-lg font-semibold mb-2">My Applications</h4>
                <p class="text-gray-400 text-sm">
                    Track the status of your submitted applications.
                </p>

            </a>

        </div>

    </section>

    <!-- APPLICATIONS SECTION -->
    <section id="applications">

        <h3 class="text-xl font-semibold mb-4 border-l-4 border-indigo-500 pl-3">
            My Applications
        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            @forelse($applications as $app)

                <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 hover:border-indigo-500 transition">

                    <div class="flex justify-between items-center mb-3">

                        <h4 class="font-semibold text-lg">
                            {{ $app->program->title ?? 'Program deleted' }}
                        </h4>

                        <!-- STATUS -->
                        <span class="text-xs px-3 py-1 rounded-full
                            @if($app->status == 'Accepted') bg-green-600
                            @elseif($app->status == 'Rejected') bg-red-600
                            @elseif($app->status == 'Under Review') bg-blue-600
                            @else bg-yellow-600
                            @endif
                        ">
                            {{ $app->status }}
                        </span>

                    </div>

                    <div class="text-sm text-gray-400 space-y-1">
                        <p><span class="text-gray-300">Name:</span> {{ $app->full_name }}</p>
                        <p><span class="text-gray-300">Email:</span> {{ $app->email }}</p>
                    </div>

                </div>

            @empty

                <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 text-gray-400">
                    You have no applications yet.
                </div>

            @endforelse

        </div>

    </section>

</main>

<!-- LOGOUT MODAL -->
<div id="logoutModal"
     class="hidden fixed inset-0 bg-black/60 flex items-center justify-center">

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 w-80 text-center">

        <h3 class="text-lg font-semibold mb-2">Confirm Logout</h3>
        <p class="text-gray-400 text-sm mb-5">
            Are you sure you want to leave your session?
        </p>

        <div class="flex justify-center gap-3">

            <button onclick="closeModal()"
                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-lg text-sm">
                Cancel
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm">
                    Yes Logout
                </button>
            </form>

        </div>

    </div>
</div>

<script>
    function openModal(){
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function closeModal(){
        document.getElementById('logoutModal').classList.add('hidden');
    }
</script>

</body>
</html>