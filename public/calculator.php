<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php"; ?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <?php if (isTeacher()) { ?>
                <h2 style="text-align: left;">Calculator</h2>
                <h3>Please choose the year:
                    <select>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                    </select>
                </h3>
                <h3>Please choose the group:
                    <select>
                        <option>Group A1</option>
                        <option>Group A2</option>
                        <option>Group A3</option>
                        <option>Group A4</option>
                        <option>Group A5</option>
                        <option>Group B1</option>
                        <option>Group B2</option>
                        <option>Group B3</option>
                        <option>Group B4</option>
                        <option>Group B5</option>
                        <option>Group E1</option>
                        <option>Group E2</option>
                        <option>Group E3</option>
                        <option>Group E4</option>
                    </select>
                </h3>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of Student</th>
                        <th>Group</th>
                        <th>Grades</th>
                        <th>Arithmetic Mean</th>
                    </tr>
                    <tr>
                        <td>Luca Andrei Iulian</td>
                        <td>E3</td>
                        <td>9</td>
                        <td><a href="#" class="button-style btn-green btn-small">Calculate</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Gosman Vlad Andrei</td>
                        <td>E3</td>
                        <td>10</td>
                        <td>
                            <a href="#" class="button-style btn-green btn-small">Calculate</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tiberiu</td>
                        <td>E3</td>
                        <td>5</td>
                        <td><a href="#" class="button-style btn-green btn-small">Calculate</a></td>
                    </tr>
                </table>
                <div class="container">
                    <div class="cal-box">
                        <form name="calculator">
                            <input class="display" type="text" name="display" placeholder="Do a calculation" readonly>
                            <br>
                            <input class="button-calc" type="button" name="button" value="7" onclick="calculator.display.value +='7'">
                            <input class="button-calc" type="button" name="button" value="8" onclick="calculator.display.value +='8'">
                            <input class="button-calc" type="button" name="button" value="9" onclick="calculator.display.value +='9'">
                            <input class="button-calc mathbutton" type="button" name="button" value="+" onclick="calculator.display.value +='+'">
                            <br>
                            <input class="button-calc" type="button" name="button" value="4" onclick="calculator.display.value +='4'">
                            <input class="button-calc" type="button" name="button" value="5" onclick="calculator.display.value +='5'">
                            <input class="button-calc" type="button" name="button" value="6" onclick="calculator.display.value +='6'">
                            <input class="button-calc" type="button" name="button" value="-" onclick="calculator.display.value +='-'">
                            <br>
                            <input class="button-calc" type="button" name="button" value="1" onclick="calculator.display.value +='1'">
                            <input class="button-calc" type="button" name="button" value="2" onclick="calculator.display.value +='2'">
                            <input class="button-calc" type="button" name="button" value="3" onclick="calculator.display.value +='3'">
                            <input class="button-calc mathbutton" type="button" name="button" value="x" onclick="calculator.display.value +='*'">
                            <br>
                            <input class="button-calc clearButton" type="button" name="button" value="C" onclick="calculator.display.value =''">
                            <input class="button-calc" type="button" name="button" value="0" onclick="calculator.display.value +='0'">
                            <input class="button-calc mathbutton" type="button" name="button" value="=" onclick="calculator.display.value =eval(calculator.display.value)">
                            <input class="button-calc mathbutton" type="button" name="button" value="/" onclick="calculator.display.value +='/'">
                            <br>
                        </form>
                    </div>
                </div>
            <?php } else if (isStudent()) { ?>
                <h2 style="text-align: left;">Calculator</h2>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Course name</th>
                        <th>Your Grades</th>
                        <th>Arithmetic Mean</th>
                    </tr>
                    <tr>
                        <td>Introduction to programming</td>
                        <td>9,6,8</td>
                        <td><a href="#" class="button-style btn-green btn-small">Calculate</a>
                        </td>
                    </tr>
                    <tr>
                        <td>ACSO</td>
                        <td>7,8,9</td>
                        <td>
                            <a href="#" class="button-style btn-green btn-small">Calculate</a>
                        </td>
                    </tr>
                </table>
                <div class="container">
                    <div class="cal-box">
                        <form name="calculator">
                            <input class="display" type="text" name="display" placeholder="Do a calculation" readonly>
                            <br>
                            <input class="button-calc" type="button" name="button" value="7" onclick="calculator.display.value +='7'">
                            <input class="button-calc" type="button" name="button" value="8" onclick="calculator.display.value +='8'">
                            <input class="button-calc" type="button" name="button" value="9" onclick="calculator.display.value +='9'">
                            <input class="button-calc mathbutton" type="button" name="button" value="+" onclick="calculator.display.value +='+'">
                            <br>
                            <input class="button-calc" type="button" name="button" value="4" onclick="calculator.display.value +='4'">
                            <input class="button-calc" type="button" name="button" value="5" onclick="calculator.display.value +='5'">
                            <input class="button-calc" type="button" name="button" value="6" onclick="calculator.display.value +='6'">
                            <input class="button-calc" type="button" name="button" value="-" onclick="calculator.display.value +='-'">
                            <br>
                            <input class="button-calc" type="button" name="button" value="1" onclick="calculator.display.value +='1'">
                            <input class="button-calc" type="button" name="button" value="2" onclick="calculator.display.value +='2'">
                            <input class="button-calc" type="button" name="button" value="3" onclick="calculator.display.value +='3'">
                            <input class="button-calc mathbutton" type="button" name="button" value="x" onclick="calculator.display.value +='*'">
                            <br>
                            <input class="button-calc clearButton" type="button" name="button" value="C" onclick="calculator.display.value =''">
                            <input class="button-calc" type="button" name="button" value="0" onclick="calculator.display.value +='0'">
                            <input class="button-calc mathbutton" type="button" name="button" value="=" onclick="calculator.display.value =eval(calculator.display.value)">
                            <input class="button-calc mathbutton" type="button" name="button" value="/" onclick="calculator.display.value +='/'">
                            <br>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </main>
    </div>
</body>

</html>