# Laravel Academic Portal Course and Enrollment System

Mini Academic Portal built with Laravel to manage Students, Courses, and Enrollments using MVC architecture and Eloquent relationships.

## Implemented Requirements

- `students` table:
  - `id`
  - `student_number` (unique)
  - `first_name`
  - `last_name`
  - `email` (unique)
  - timestamps
- `courses` table:
  - `id`
  - `course_code` (unique)
  - `course_name`
  - `capacity` (integer)
  - timestamps
- `enrollments` table (pivot):
  - `id`
  - `student_id` (FK to `students.id`)
  - `course_id` (FK to `courses.id`)
  - timestamps
  - unique pair constraint on (`student_id`, `course_id`)

## Eloquent Relationships

- `Student` model:
  - `belongsToMany(Course::class, 'enrollments')->withTimestamps()`
- `Course` model:
  - `belongsToMany(Student::class, 'enrollments')->withTimestamps()`

## Modules

- Student module:
  - list all students
  - view student profile with enrolled courses
- Course module:
  - list all courses
  - view course detail with enrolled students
- Enrollment module:
  - enroll student in course
  - prevent duplicate enrollments
  - enforce course capacity

## Business Rules Enforced

- No duplicate enrollment per student/course.
- Enrollment blocked when course reaches capacity.
- Student identity protection in enrollment flow:
  - rejects enroll attempts when email and student number belong to different existing records.

## Setup

1. Install dependencies:
   ```bash
   composer install
   npm install
   ```
2. Create env file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure database in `.env`.
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Start app:
   ```bash
   php artisan serve
   npm run dev
   ```

## Submission Notes

- Push project to your own GitHub repository.
- Include:
  - all source code
  - migration files
- Exclude:
  - `.env`
  - `vendor/`
  - `node_modules/`

For zip submission, compress the project without `vendor/` and `node_modules/`.
