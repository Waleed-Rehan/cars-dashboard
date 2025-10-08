<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Cars Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen text-gray-800">

    <main class="w-full max-w-md px-8 py-10 bg-white rounded-3xl shadow-2xl backdrop-blur-sm">
        
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Create an Account</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg px-4 py-3 text-left text-sm mb-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register" class="space-y-6">
            @csrf

            <div class="text-left">
                <label for="name" class="block text-sm font-semibold text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" required
                       class="mt-1 w-full px-4 py-2 border border-slate-300 rounded-xl shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            </div>

            <div class="text-left">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email address</label>
                <input type="email" id="email" name="email" required
                       class="mt-1 w-full px-4 py-2 border border-slate-300 rounded-xl shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            </div>

            <div class="text-left">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 w-full px-4 py-2 border border-slate-300 rounded-xl shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            </div>

            <div class="text-left">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                       class="mt-1 w-full px-4 py-2 border border-slate-300 rounded-xl shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
            </div>

            <button type="submit"
                    class="w-full px-4 py-3 bg-indigo-600 text-white text-base font-semibold rounded-full shadow-md hover:bg-indigo-700 hover:shadow-lg transition-transform duration-200">
                📝 Register
            </button>
        </form>

        <p class="text-sm text-center text-gray-600 mt-6">
            Already have an account?
            <a href="/login" class="text-indigo-600 font-medium hover:underline">Log in here</a>
        </p>
    </main>

</body>
</html>
