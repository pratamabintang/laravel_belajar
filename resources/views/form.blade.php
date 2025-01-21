<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    
    <header>
        <h1>Buat Account Baru!</h1>
    </header>
    <main>
        <h3>Sign Up Form</h3>
        <form action="/welcome" method="post">
            @csrf
            <p>First name:</p>
            <input type="text" name="first_name">
            <p>Last name:</p>
            <input type="text" name="last_name">
            <p>Gender:</p>
            <label>
                <input type="radio" value="Male" name="gender">Male
            </label><br>
            <label>
                <input type="radio" value="Female" name="gender">Female
            </label><br>
            <label>
                <input type="radio" value="Other" name="gender">Other
            </label>
            <p>Nationality:</p>
            <select name="nationality">
                <option value="Indonesian" selected>Indonesian</option>
                <option value="Greece">Greece</option>
            </select>
            <p>Language Spoken:</p>
            <label>
                <input type="checkbox" value="Bahasa Indonesia" name="language">Bahasa Indonesia
            </label><br>
            <label>
                <input type="checkbox" value="English" name="language">English
            </label><br>
            <label>
                <input type="checkbox" value="Other" name="language">Other
            </label>
            <p>Bio:</p>
            <textarea cols="10" row="5" name="bio"></textarea><br>
            <button type="submit">Sign Up</button>
        </form>
    </main>
</body>
</html>