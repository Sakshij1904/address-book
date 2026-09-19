<!DOCTYPE html>
<html>
<head>
    <title>Manage Groups</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 90%;
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
        }

        input {
            flex: 1;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        .delete {
            background: #dc3545;
            padding: 7px 12px;
        }

        .delete:hover {
            background: #b02a37;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>👥 Manage Groups</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('groups.store') }}" method="POST">

        @csrf

        <input type="text"
               name="name"
               placeholder="Enter group name"
               required>

        <button type="submit">
            + Add Group
        </button>

    </form>

    <table>

        <tr>
            <th>Group Name</th>
            <th>Action</th>
        </tr>

        @foreach($groups as $group)

        <tr>
            <td>{{ $group->name }}</td>

            <td>
                <form action="{{ route('groups.destroy', $group->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete">
                        Delete
                    </button>

                </form>
            </td>
        </tr>

        @endforeach

    </table>

    <a href="{{ route('contacts.index') }}" class="back">
        ← Back to Address Book
    </a>

</div>

</body>
</html>