<?php include('dbcon.php'); ?>
<?php include('header.php'); ?>
<div class="container">
    <h3>Add Patron</h3>
    <form action="save_patron.php" method="POST">
        <label>Library Card ID:</label>
        <input type="text" name="libraryCardID" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Card Expire Date:</label>
        <input type="date" name="cardexpire" required><br>

        <label>First Name:</label>
        <input type="text" name="firstname" required><br>

        <label>Last Name:</label>
        <input type="text" name="lastname" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Street:</label>
        <input type="text" name="street" required><br>

        <label>City:</label>
        <input type="text" name="city" required><br>

        <label>State:</label>
        <input type="text" name="state" maxlength="2" required><br>

        <label>Zip Code:</label>
        <input type="text" name="zipcode" required><br>

        <button type="submit" name="submit">Save</button>
    </form>
</div>
