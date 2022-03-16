# Gravity Forms Add-On List Merge Tag
This add-on overrides the default list field merge tag behavior that returns comma seperated column values.
Using this add-on makes it possible to select individual list field columns values with its merge tag.

## Original Behavior
```
{<list label>:<id>}
val1,val2,val3
```

## New Behavior
```
{<list label>:<id>:<column>}
val1
```
