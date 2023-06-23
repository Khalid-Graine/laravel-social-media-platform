<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
        referrerpolicy="no-referrer" />
    <title>inscreption</title>
</head>

<body>
    <div class="flex justify-center items-center bg-slate-400">
        <div class="">
            <p class="font-semibold">Welcome <span class="text-blue-500">{{ $email }}</span>!</p>
            <p> Thank you for signing up for our platform</p>
            <br>
            <p>Please verify your email address by clicking the button below.
            </p>
            <br>
            <br>
            <a href="{{ $href }}" class="p-2 bg-blue-500 text-white rounded-sm font-medium">Confirm my account</a>
            <br>
            <br>
            <p>Note that unverified accounts are automatically deleted 30 days after signup.</p>
            <br>
            <p>If you didn't request this, please ignore this email.</p>
        </div>
    </div>
</body>

</html>
