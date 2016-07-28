# JackRabbitClass
- **Author:** Borlandia LLC
- **Email:** Kevin@Borlandiaweb.com
> Display upcoming classes using JackRabbitClass API.

### Basic Usage:

```sh
[jr-class-listings orgID="12345"]
```

**orgID is required to pull in the data.**

**Hide Columns:** Class, Description, Days, Times, Gender, Ages, Openings, StartDate, EndDate, Session, Tuition.
[Reference](http://jackrabbithelp.com/learn/default.aspx?pageid=hiding_columns)
```sh
[jr-class-listings orgID="12345" HideCols="Description, Gender"]
```
**Add Columns:** Location, Cat1, Cat2, Cat3, Instructors, Duration, Room
[Reference](http://jackrabbithelp.com/learn/default.aspx?pageid=adding_columns)
```sh
[jr-class-listings orgID="12345" ShowCols="Instructors, Room"]
```
**Sort By:**
- Class (Name in ABC order)Days, StartTime, Ages, Gender, Openings, StartDate, EndDate, Session, Tuition, Location, Cat1, Cat2, Cat3, Instructors, Duration, Room.
[Reference](http://jackrabbithelp.com/learn/default.aspx?pageid=sorting_rows)
```sh
[jr-class-listings orgID="12345"]
```
### Further Customization:

- **%20desc** - Use after a sort target to make a reverse sort (sort in descending order instead of ascending order).
- **hidereg="1"** - This will hide the register column.
- **hdrstyle="color:blue"** - This will change color of header text to specified color.
- **hdrstyle="display:none"** - This will hide the header row, in case you want to stack several tables.
- **style="color:red"** - This will change color of body text to specified color.
- **ClassStyle="font-weight:bold"** - This will change font of Class names to bold.
- **ShowClosed="1"** - To temporarily over-ride your system setting of not showing any full classes.
- **Closed="Full"** - This will change all "0"s in openings column to display text such as "Full" or "Please Call" or other text specified.
- **registertext="Enroll"** - This will change the word Register to Enroll, or other text, throughout table.
- **tuitionlabel="Fee"** - This will change the Tuition header name to Fee, or other text.
- **classlabel="Program"** - This will change the Class header name to Program, or other text.
- **Cat1="dog | fish | bear | tiger"** - Use spaces and the | symbol to join/show multiple Category 1 names in the same table (not possible for Cat2 or Cat3).

### Installation

**From your WordPress dashboard**
- Visit 'Plugins > Add New'.
- Search for 'JackRabbitClass'.
- Activate JackRabbitClass from your Plugins page.

**From our Github repository**
- Download JackRabbitClass from [Github](https://github.com).
- Upload the 'JackRabbitClass' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...).
- Activate JackRabbitClass from your Plugins page.

### Development

Want to contribute? Great!

### Roadmap

 - Custom CSS
 - Clean Up Code
 - Add Code Comments

### Version
- 1.0

### License

- MIT
