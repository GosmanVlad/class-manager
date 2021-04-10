<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); ?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <?php if (isStudent()) { ?>
                <h2 style="text-align: left;">Files you have uploaded so far:</h2>
                <table id="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of the file</th>
                        <th>Grade Received</th>
                        <th id="fit">The teacher that corrected your assignment</th>
                        <th>Additional message from your teacher</th>
                    </tr>
                    <tr>
                        <td>math.pdf</td>
                        <td>7</td>
                        <td>Corina Forascu</td>
                        <td>NULL
                        </td>
                    </tr>
                    <tr>
                        <td>sql-script-homework2.sql</td>
                        <td>9</td>
                        <td>Cosmin Varlan</td>
                        <td>
                            Did you copy your homework from someone else?
                        </td>
                    </tr>
                </table>
                <p>Click on the "Choose File" button to upload a new file:</p>
                <form action="#">
                    <input type="file" id="myFile" name="filename">
                    <input type="submit" class="btn-small btn-cyan">
                </form>
            <?php } else if (isTeacher()) { ?>
                <h2 style="text-align: left;">Files you haven't graded yet</h2>
                <table id="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of the student</th>
                        <th>Name of the file</th>
                        <th>Grade given</th>
                        <th>Additional message from you</th>
                        <th>Submit</th>
                    </tr>
                    <tr>
                        <td>Luca Andrei Iulian</td>
                        <td>math.pdf</td>
                        <td><select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </td>
                        <td><input type="text" id="message"></td>
                        <td>
                            <input type="submit" class="btn-small btn-cyan">
                        </td>
                    </tr>
                    <tr>
                        <td>Gosman Vlad Andrei</td>
                        <td>script.sql</td>
                        <td><select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </td>
                        <td><input type="text" id="message"></td>
                        <td>
                            <input type="submit" class="btn-small btn-cyan">
                        </td>
                    </tr>
                </table>

            <?php } ?>
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>