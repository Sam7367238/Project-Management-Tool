@csrf

<div>
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $project -> name ?? '') }}">
</div>

<div>
    <label for="description">Description (Optional)</label><br>
    <textarea name="description" rows="8" cols="50">{{ old('description', $project -> description ?? '') }}</textarea>
</div>

@if (request() -> is("projects/create"))
    <div>
        <label for="finish_date">Finish Date:</label>
        <input type="date" name="finish_date" value="{{ old('finish_date') }}">
    </div>
@endif

<input type="submit" value="Save">