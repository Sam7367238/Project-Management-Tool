@csrf

<div>
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $project -> name ?? '') }}">
</div>

<input type="submit" value="Save">