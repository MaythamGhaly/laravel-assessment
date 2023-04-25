@extends('layout')

<div class="content">
    <form class="container">
        <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo">
        <input type="text" placeholder="name" class="input">
        <input type="text" placeholder="email" class="input">
        <input type="password" placeholder="password" class="input">
        <input type="password" placeholder="renter-password" class="input">
        <input type="number" placeholder="phone number: 71XXXXXX" class="input">
        <input type="text" placeholder="gender" class="input">
        <input type="text" placeholder="department" class="input">
        <div action="/action_page.php" class="gender">
            <label for="genders">Gender:</label>
            <select name="genders" id="cars" class="dropdown">
                <option value="volvo">Male</option>
                <option value="saab">Female</option>
            </select>
            <br><br>
        </div>
        <input type="submit" value="Register" class="button">

    </form>
</div>
