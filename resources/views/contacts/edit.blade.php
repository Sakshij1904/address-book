<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
        }

        .update-btn {
            width: 100%;
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .update-btn:hover {
            background: #0056b3;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #007bff;
            text-decoration: none;
        }

        .groups {
            margin-bottom: 18px;
        }

        .group-item {
            margin-bottom: 8px;
        }

        .group-item input {
            width: auto;
            margin: 0 8px 0 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>✏️ Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $contact->name }}"
               placeholder="Enter full name"
               required>


        <label>Phone</label>

        <input type="text"
               name="phone"
               value="{{ $contact->phone }}"
               placeholder="Enter phone number"
               required>


        <label>Email</label>

        <input type="email"
               name="email"
               value="{{ $contact->email }}"
               placeholder="Enter email address">


        <label>Address</label>

        <input type="text"
               name="address"
               value="{{ $contact->address }}"
               placeholder="Enter address">


        <label>Groups</label>

        <div class="groups">

            @foreach($groups as $group)

                <div class="group-item">

                    <label style="font-weight: normal;">

                        <input type="checkbox"
                               name="groups[]"
                               value="{{ $group->id }}"
                               {{ $contact->groups->contains($group->id) ? 'checked' : '' }}>

                        {{ $group->name }}

                    </label>

                </div>

            @endforeach

        </div>


        <button type="submit" class="update-btn">
            Update Contact
        </button>

    </form>

    <a href="{{ route('contacts.index') }}" class="back">
        ← Back to Address Book
    </a>

</div>

</body>
</html>