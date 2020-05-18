# Draftable

Draftable - A library to quickly support draft and proposed content for your Laravel models.

It is different to others in that it does not create models tagged with a draft status, but instead:

* Allows multiple users to draft new content for existing models, as well as new
* Identifies when a model has been updated since the draft was prepared
* Optionally shows the specific changes to the model, since the draft was started
* Allows configuration of which properties are draftable, and which should be used to show specific changes

However, it does this by keeping drafts in a separate table using a JSON column for draft attributes. This probably covers the vast majority of use cases, but should be kept in mind as a constraint. We're open to alternative implementations.

# Usage

Require the library
Configure e.g. user model

Create a draftable model
use draftable
$protected draftableComparisons = []; // Always looks at updated_at, uses these to what has changed.

Save draft content (when they press save as draft, or automatically e.g. with Livewire. Set lazy updates appropriately)
Commit draft content (auto destroys, checking for commit first)
Delete draft.


## Config
User model

## API

$model->draft()->for($user)->withContent(['attrs'=>'values'])->save();
draft() - prepares an object for the model, assumes user is current id or null; finds and populates if exists.
with content - updates object draft content
save - saves model to database using update (if has ID) or create.

$model->hasDraft
true if model has draft for user id / no user id.

$model->draft()
Get a populated or new draft for the model.

$model->draft()->commit();
Effectively $model->update($draft->attributes) then $draft->delete();

$model->draft()->commit(['a', 'b']);
$model->update($draft->attributes->only(['a', 'b']) then delete draft.

$model->draft()->isStale
true if the model was updated since the draft was last updated 
If monitored attributes provided, then only true if they have changed

$model->draft()->staleAttributes
Array of monitored attributes that have changed, with the model's current and previous values.

$model->draft()->staleDelta()
Array of marked up changes

$model->draft()->staleDelta(['only', 'these'])


$model->draft()->trash();

$model->draft()->trashAll();


Draftable::trashAllForModel(Model::class);
Draftable::trashAllForUser($user);
Draftable::trashAll();

## Advanced

Set array keys with class name for a custom diff engine.
$draftableDifferences = [
    'text_attr' => \LittleGreenMan\Draftable\Comparators\TextComparator::class,
    'html_attr' => \LittleGreenMan\Draftable\Comparators\HTMLComparator::class,
];
