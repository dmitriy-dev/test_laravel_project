<?php


namespace Core\User;


class UserService
{
    /**
     * @param string $name
     * @param string $email
     * @param string $status
     * @param string $password
     * @return User
     */
    public function create(
        string $name,
        string $email,
        string $status,
        string $password
    ): User
    {
        /** @var User $user */
        $user = User::make();
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;
        $user->password = bcrypt($password);

        try {
            $user->saveOrFail();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error saving user.', $exception->getCode(), $exception);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param string $name
     * @param string $email
     * @param string $status
     * @param string|null $password
     */
    public function update(
        User $user,
        string $name,
        string $email,
        string $status,
        string $password = null
    ): void
    {
        $user->name = $name;
        $user->email = $email;
        $user->status = $status;

        if (null !== $password) {
            $user->password = bcrypt($password);
        }

        try {
            $user->saveOrFail();
            $user->refresh();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error saving user.', $exception->getCode(), $exception);
        }
    }
}
