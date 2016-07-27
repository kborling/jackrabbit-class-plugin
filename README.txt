=== Borlandia JackRabbitClass ===
Requires at least: 1.0
Tested up to: 1.0
Stable tag: 1.0
License: MIT

Display upcoming classes using JackRabbitClass API.

Shortcode: [jr-class-listings orgID="12345" Style="color:#000000" ClassStyle="font-weight:bold"]
*orgID is required to pull in the data.

Hide Columns: Class, Description, Days, Times, Gender, Ages, Openings, StartDate, EndDate, Session, Tuition.
Ref: http://jackrabbithelp.com/learn/default.aspx?pageid=hiding_columns

Add Columns: Location, Cat1, Cat2, Cat3, Instructors, Duration, Room
Ref: http://jackrabbithelp.com/learn/default.aspx?pageid=adding_columns

Sort By: Class (Name in ABC order), Days, StartTime, Ages, Gender, Openings, StartDate, EndDate, Session, Tuition, Location, Cat1, Cat2, Cat3, Instructors, Duration, Room
Ref: http://jackrabbithelp.com/learn/default.aspx?pageid=sorting_rows

Further Customization:

%20desc                             use after a sort target to make a reverse sort (sort in descending order instead of ascending order).
hidereg="1"                         will hide the register column.
hdrstyle="color:blue"               will change color of header text to specified color.
hdrstyle="display:none"             will hide the header row, in case you want to stack several tables.
style="color:red"                   will change color of body text to specified color.
ClassStyle="font-weight:bold"       will change font of Class names to bold.
ShowClosed="1"                      to temporarily over-ride your system setting of not showing any full classes.
Closed="Full"                       will change all "0"s in openings column to display text such as "Full" or "Please Call" or other text specified.
registertext="Enroll"               will change the word Register to Enroll, or other text, throughout table.
tuitionlabel="Fee"                  will change the Tuition header name to Fee, or other text.
classlabel="Program"                will change the Class header name to Program, or other text.
Cat1="dog | fish | bear | tiger"    use spaces and the | symbol to join/show multiple Category 1 names in the same table (not possible for Cat2 or Cat3).  Note that this usually works but may not in all cases.  You are welcome to try it.
