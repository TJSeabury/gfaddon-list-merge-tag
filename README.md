# Gravity Forms Add-On List Merge Tag
This add-on overrides the default List Field merge tag behavior that returns comma seperated column values.
Using this add-on makes it possible to select individual List Field column values with its merge tag by supplying an integer to the tag modifier.

## Original Behavior
```
{<descriptor>:<field_id>:<modifier>}
val1,val2,val3
```
See: https://docs.gravityforms.com/field-merge-tags/

## New Behavior
```
{<descriptor>:<field_id>:<column>}
val1
```
Applies only to List Field merge tags.
