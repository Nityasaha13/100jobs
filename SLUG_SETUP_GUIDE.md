# Slug Implementation Setup Guide

## Overview
This guide will help you set up slug-based URLs for your 100jobs Laravel application. Slugs are URL-friendly versions of resource names (e.g., `john-doe` instead of `1` for users, `php-developer-acme-corp` instead of `1` for jobs).

## Setup Steps

### 1. Run Migrations

First, add the slug columns to your `users` and `jobs` tables:

```bash
php artisan migrate
```

This will run the newly created migrations:
- `2025_02_24_000000_add_slug_to_users_table.php`
- `2025_02_24_000001_add_slug_to_jobs_table.php`

### 2. Generate Slugs for Existing Records

Run the command to generate slugs for all existing users and jobs:

```bash
php artisan generate:slugs
```

This command will:
- Generate unique slugs for all users based on their names (e.g., "john-doe", "john-doe-1", etc.)
- Generate unique slugs for all jobs based on their role and company (e.g., "php-developer-acme-corp")
- Skip records that already have slugs
- Display progress for each generated slug

### 3. Verify the Changes

After running the migrations and slug generation:

1. **Test User URLs**: Navigate to `http://yoursite.com/user/john-doe` instead of `/user/1`
2. **Test Job URLs**: Navigate to `http://yoursite.com/job/php-developer-acme-corp` instead of `/job/1`

### 4. What Changed

#### Models Updated:
- **User.php**: Added automatic slug generation and route key name
- **Job.php**: Added automatic slug generation and route key name

#### Routes Updated:
- `/job/{id}` → `/job/{job}` (uses slug automatically)
- `/user/{id}` → `/user/{user}` (uses slug automatically)
- Other job management routes now use slug parameters

#### Controllers Updated:
- **JobsController**: Methods now use model binding with slugs
- **ApplyJobsController**: Updated to work with slug-based routes
- **SavedJobsController**: Updated to work with slug-based routes
- **CandidatesController**: Updated to work with slug-based routes
- **PublicProfileController**: Updated to work with slug-based routes

#### Views Updated:
All blade templates have been updated to generate links using slug parameters instead of IDs:
- Job listing pages
- User profile pages
- Candidate pages
- Saved jobs pages
- Applied jobs pages

## Slug Generation Rules

### For Users:
- Slugs are generated from the user's name
- If a slug already exists, a number is appended (e.g., "john-doe-2")
- Slugs are automatically updated if the user's name is changed

### For Jobs:
- Slugs are generated from the job role and company
- If a slug already exists, a number is appended
- Slugs are automatically updated if the job role or company is changed

## Important Notes

1. **Automatic Slug Generation**: New users and jobs will automatically have slugs generated when created. You don't need to do anything manually.

2. **Slug Uniqueness**: The system ensures all slugs are unique. If a slug already exists, a number will be appended.

3. **Backward Compatibility**: The system still supports ID-based lookups internally. However, all URLs should now use slugs.

4. **SEO Benefits**: Slugs make URLs more readable and SEO-friendly than numeric IDs.

## Testing

After setup, test the following scenarios:

1. Create a new user and verify the slug is auto-generated
2. Create a new job and verify the slug is auto-generated
3. Update a user's name and verify the slug is updated
4. Update a job's role/company and verify the slug is updated
5. Create duplicate users/jobs and verify slugs have numbers appended
6. Access URLs using slugs (should work)
7. Old ID-based URLs should fail or redirect (if implemented)

## Troubleshooting

### Issue: Duplicate slugs
**Solution**: Run `php artisan generate:slugs` again. It should handle duplicates properly.

### Issue: Slugs not generating for new records
**Solution**: Ensure the `slug` column is in the model's `$fillable` array. Check that the `booted()` method is properly defined in the model.

### Issue: Routes not working
**Solution**: Clear your route cache:
```bash
php artisan route:cache
php artisan route:clear
```

## Database Structure

### Users Table:
- New column: `slug` (string, unique, nullable)
- Example: `john-doe`, `jane-smith`, `admin-user`

### Jobs Table:
- New column: `slug` (string, unique, nullable)
- Example: `senior-php-developer-acme`, `junior-designer-tech-corp`

## Future Enhancements

Consider implementing:
1. Slug validation to prevent conflicts
2. Automatic slug URL redirects for old ID-based links
3. Custom slug modification through admin interface
4. Slug history tracking
