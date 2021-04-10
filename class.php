<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); ?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">The Catalog</h2>
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
            <table id="table-style" style="text-align: left;">
                <tr>
                    <th>Name of Student</th>
                    <th>Group</th>
                    <th>Grades</th>
                    <th id="fit">Presence</th>
                </tr>
                <tr>
                    <td>Luca Andrei Iulian</td>
                    <td>E3</td>
                    <td>9</td>
                    <td><svg id="thick-logo" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.312-9.688l.515 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm12.52 3.317v6.594h-16v-16h15.141c.846-.683 1.734-1.341 2.691-2h-19.832v20h20v-11.509c-.656.888-1.318 1.854-2 2.915z" />
                        </svg>
                    </td>
                </tr>
                <tr>
                    <td>Gosman Vlad Andrei</td>
                    <td>E3</td>
                    <td>10</td>
                    <td>
                        <svg id="thick-logo" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.312-9.688l.515 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm12.52 3.317v6.594h-16v-16h15.141c.846-.683 1.734-1.341 2.691-2h-19.832v20h20v-11.509c-.656.888-1.318 1.854-2 2.915z" />
                        </svg>
                    </td>
                </tr>
                <tr>
                    <td>Tiberiu</td>
                    <td>E3</td>
                    <td>5</td>
                    <td></td>
                </tr>
            </table>
            <div class="input-box">
                <h2>Generator</h2>
                <input type="text" name="" placeholder="Random Code" id="code" readonly="">
                <div id="generate-btn" onclick="getCode();">Generate your presence code</div>
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
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>