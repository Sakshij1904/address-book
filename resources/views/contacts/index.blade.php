<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .add-btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
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

        .edit {
            color: green;
            text-decoration: none;
            margin-right: 10px;
        }

        .delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📒 Address Book</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('contacts.create') }}" class="add-btn">
        + Add Contact
    </a>

    <form action="{{ route('contacts.index') }}" method="GET"
      style="margin-bottom: 25px;">

    <input type="text"
           name="search"
           value="{{ request('search') }}"
           placeholder="Search by name, phone or email"
           style="padding: 10px; width: 45%; border: 1px solid #ccc; border-radius: 5px;">

    <select name="group"
            style="padding: 10px; width: 25%; border: 1px solid #ccc; border-radius: 5px;">

        <option value="">All Groups</option>

        @foreach($groups as $group)
            <option value="{{ $group->id }}"
                {{ request('group') == $group->id ? 'selected' : '' }}>
                {{ $group->name }}
            </option>
        @endforeach

    </select>

    <button type="submit"
            style="background: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
        Search
    </button>

    <a href="{{ route('contacts.index') }}"
       style="margin-left: 10px; color: #007bff; text-decoration: none;">
        Clear
    </a>

</form>

    <table>

        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Groups</th>
            <th>Action</th>
        </tr>

        @foreach($contacts as $contact)

        <tr>
            <td>{{ $contact->name }}</td>

            <td>{{ $contact->phone }}</td>

            <td>{{ $contact->email }}</td>

            <td>{{ $contact->address }}</td>

            <td>
                @foreach($contact->groups as $group)

                    {{ $group->name }}

                    @if(!$loop->last)
                        ,
                    @endif

                @endforeach
            </td>

            <td>

                <a href="{{ route('contacts.edit', $contact->id) }}"
                   class="edit">
                    Edit
                </a>

                <form action="{{ route('contacts.destroy', $contact->id) }}"
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

</div>

</body>
</html>