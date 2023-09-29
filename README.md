# Dice Roller (Alfred Workflow)

Alfred workflow that uses D&D dice notation to produce random numbers. I wrote this script years ago, but never thought to post it to GitHub. I may revisit this script and convert the PHP to Python at a future date.

The script uses the syntax of `[number of rolls]d[size of die]` to determine the random number. For example, `1d20` would be the equivalent of rolling a 20-sided die and `3d20` would be the equivalant of rolling a 20-sided die three times. When requesting multiple rolls, the script notification will show you the result of each roll followed by the total.

This is a simple randomization script and is not limited to standard dice. As long as the syntax is followed a roll of `14d153` is still considered a valid query.

**Developer note**: Usually I would not commit vendor files or `.png` images to a repository, but I am doing it here for both the ease-of-use of users (especially those who are not familiar with _Composer_) and for a pleasent experience with `icon.png` in the Alfred prompt.

### Installation

- Download repository.
- Go to Alfred preferences.
- Click on _Workflows_.
- Create a new blank workflow.
- Right-click workflow; select _Open in Finder_.
- Place files from downloaded repository into the opened directory.
- Trigger the workflow by typing `roll [query]` into Alfred and hitting return.
  - _Example_: `roll 2d10`
