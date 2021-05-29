<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php"; ?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">The Catalog</h2>
            <?php if (isTeacher()) { ?>
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
                        <th>Presence</th>
                        <th>Revoke this student</th>
                    </tr>
                    <tr>
                        <td>Luca Andrei Iulian</td>
                        <td>E3</td>
                        <td>9</td>
                        <td><svg class="thick-logo" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.312-9.688l.515 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm12.52 3.317v6.594h-16v-16h15.141c.846-.683 1.734-1.341 2.691-2h-19.832v20h20v-11.509c-.656.888-1.318 1.854-2 2.915z" />
                            </svg>
                        </td>
                        <td><button type="button" class="button-style btn-small btn-red">Revoke</button></td>
                    </tr>
                    <tr>
                        <td>Gosman Vlad Andrei</td>
                        <td>E3</td>
                        <td>10</td>
                        <td>
                            <svg class="thick-logo" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.312-9.688l.515 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm12.52 3.317v6.594h-16v-16h15.141c.846-.683 1.734-1.341 2.691-2h-19.832v20h20v-11.509c-.656.888-1.318 1.854-2 2.915z" />
                            </svg>
                        </td>
                        <td><button type="button" class="button-style btn-small btn-red">Revoke</button></td>
                    </tr>
                    <tr>
                        <td>Tiberiu</td>
                        <td>E3</td>
                        <td>5</td>
                        <td></td>
                        <td><button type="button" class="button-style btn-small btn-red">Revoke</button></td>
                    </tr>
                </table>
                <h3 style="text-align: right;">Export this catalog in:
                    <select>
                        <option>HTML</option>
                        <option>CSV</option>
                        <option>PDF</option>
                    </select>
                </h3>
                <button type="button" class="button-style btn-small btn-red" style="float:right">Export</button>
                <div class="input-box">
                    <h2 class="input-box-h2">Generator</h2>
                    <h3>This code will be active for:
                        <select>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                        </select>
                        minutes.
                    </h3>
                    <input type="text" name="" placeholder="Random Code" id="code" readonly="">
                    <div class="generate-btn" onclick="getCode();">Generate your presence code</div>

                    <script type="text/javascript">
                        function getCode() {
                            var chars = "0123456789abcdefghijklmnopqrstuvwxtzABCDEFGHIJKLMNOPQRSTUVWXTZ";
                            var codeLength = 6;
                            var code = "";
                            for (var i = 0; i < codeLength; i++) {
                                var randomChar = Math.floor(Math.random() * chars.length);
                                code += chars.substring(randomChar, randomChar + 1);
                            }
                            document.getElementById("code").value = code;
                        }
                    </script>
                </div>
            <?php } else if (isStudent()) { ?>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Course Name</th>
                        <th>Your Grades</th>
                        <th>Number of presences</th>
                    </tr>
                    <tr>
                        <td>ACSO</td>
                        <td>6,7,8</td>
                        <td>9/12</td>
                    </tr>
                    <tr>
                        <td>Data Structures</td>
                        <td>8,5,10</td>
                        <td>8/12</td>
                    </tr>
                    <tr>
                        <td>Math</td>
                        <td>6,7,9</td>
                        <td>7/12</td>
                    </tr>
                </table>
                <div class="input-box">
                    <h2 class="input-box-h2">Please input your presence code:</h2>
                    <input type="text" name="code" placeholder="" id="code">
                    <div class="generate-btn">Submit</div>
                </div>
            <?php } ?>
        </main>
    </div>
</body>

</html>