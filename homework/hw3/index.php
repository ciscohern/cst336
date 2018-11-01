<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8"/>
  
        <title>
           Sports
        </title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
<body background="sports.jpg">
    <header>
        <h1 id="title">
            <center>
            Sports
            </center>
        </h1>
    </header>
<main>
<br></br>
<form action="action_page.php" method="get">
    <div id="names">
    <fieldset >
        <legend>Name</legend>
        <input type="text" name="firstname" placeholder="First Name" /> 
        <input type="text" name="lastname" placeholder="Last Name" /> 
       
     </fieldset>
     </div>
     <br></br>
    <div id="genders">
    <fieldset>
        <legend>Gender</legend>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other
    </fieldset>
    </div>
    <br></br>
    <div id="sports">
    <fieldset>
        <h3>Select one of your favorite sports:</h3>
        <label><input type="checkbox" value="football" name="sport"> Football</label>
        <label><input type="checkbox" value="baseball" name="sport"> Baseball</label>
        <label><input type="checkbox" value="cricket" name="sport"> Cricket</label>
        <label><input type="checkbox" value="boxing" name="sport"> Boxing</label>
        <label><input type="checkbox" value="racing" name="sport"> Racing</label>
        <label><input type="checkbox" value="swimming" name="sport"> Swimming</label>
        <br>
    </fieldset>
    </div>

    <br></br>
    <div id='teams'>
    <fieldset>
        <legend>Favorite Team</legend>
        <select name="teams">
        <option value="seahawks" name="team">Seattle Seahawks</option>
        <option value="bears" name="team">Chicago Bears</option>
        <option value="chiefs" name="team">Kansas City Chiefs</option>
        <option value="raiders" name="team">Raiders</option>
  </select>
  </fieldset>
  </div>
  <br></br>
    <input type="submit" name="submit" /> 
</form>
</main>
</body>
</html>
