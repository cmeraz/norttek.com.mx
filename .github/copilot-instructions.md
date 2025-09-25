# Copilot Instructions for Norttek Solutions Website

## Overview
This codebase is a modular PHP website for Norttek Solutions, structured for maintainability and scalability. It uses template inclusion, automatic asset loading, and JSON-driven content for product data.

## Key Architectural Patterns
- **Template Inclusion:** All main pages include `includes/pageTemplate.php`, which loads the header, navbar, main content, and footer. Page-specific CSS/JS are loaded automatically if present in `assets/css/` or `assets/js/`.
- **Content Separation:** Main content for each page is placed in `contents/{pageName}Content.php`. Shared UI components are in `includes/`.
- **Data-Driven Pages:** Product and catalog data (e.g., printer cartridges) are stored as JSON in `includes/json/` and loaded dynamically in content PHP files.
- **Navigation:** The menu is defined in `includes/navbar.php` as a PHP array, supporting nested menus and icons.

## Developer Workflows
- **Add a New Page:**
  1. Create `my_page.php` in the root.
  2. Set `$pageName = basename(__FILE__, ".php");`
  3. Optionally define `$cssFiles` and `$jsFiles` arrays (filenames without extension).
  4. `include __DIR__ . '/includes/pageTemplate.php';`
  5. Add main content in `contents/my_pageContent.php`.
- **Assets:**
  - Place CSS in `assets/css/` and JS in `assets/js/`.
  - Use the same base name as the page for automatic loading.
- **Product Data:**
  - Add or update JSON files in `includes/json/` (e.g., `cartuchos.json`, `hp-color.json`).
  - Access and decode JSON in content PHP files as needed.

## Project Conventions
- **File Naming:**
  - Page files: lowercase, hyphen-separated (e.g., `control-acceso.php`).
  - Asset files: match page name for auto-loading.
- **Componentization:**
  - Use `includeTemplate('name')` for shared templates from `templates/`.
  - Use `includeSection('name', $vars)` for templates with variables.
- **SEO & Redirects:**
  - Redirection rules in `.htaccess` (e.g., `inicio.php` → `index.php`).
- **External Dependencies:**
  - Tailwind CSS, GSAP, AOS, FontAwesome, Toastify (see `README.md`).

## Examples
- See `cartuchos.php` and `contents/cartuchosContent.php` for a typical data-driven page.
- See `includes/functions.php` for template inclusion helpers.
- See `README.md` for full structure and contribution workflow.

## Tips for AI Agents
- Always use the template and asset loading conventions for new pages/components.
- When adding product data, update the relevant JSON and ensure the content PHP reads from it.
- Follow the navigation and component patterns in `includes/` and `templates/`.
- Keep file and variable naming consistent for auto-loading and maintainability.

# Language
Todas las respuestas, mensajes de commit y descripciones de pull request deben estar en español neutro. Usa un tono profesional, conciso y claro.
