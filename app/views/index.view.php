<?php require __DIR__.'/partials/header.php';?>
    <h1>Form Request</h1>
    <form action="/form" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
<?php require __DIR__.'/partials/footer.php';?>